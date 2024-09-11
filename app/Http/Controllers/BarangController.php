<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportBarang;
use App\Models\Nota;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class BarangController extends Controller
{
    //
    public function index()
    {
        //get posts
        $barang = Barang::latest()->paginate(5);
        $upload = upload::latest()->paginate(5);
        $count = Upload::where('status','Pending')->get()->count();

        //render view with posts
        return view('admin.barang.index', compact('barang','count','upload'));
    }

    public function create()
    {
      if (Auth::check()) {
      $upload = upload::latest()->paginate(5);
        $count = Upload::where('status','Pending')->get()->count();
        return view('admin.barang.create', compact('count','upload'));
      }
      return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function store(Request $request)
    {
    $this->validate($request, [
        'nama_barang' => 'required|min:3',
        'harga_barang' => 'required|min:3',
        'stok' => 'required|min:1'

      ]);

      $barang = Barang::create([
        'nama_barang' => $request->nama_barang,
        'harga_barang' => $request->harga_barang,
        'stok' => $request->stok,
      ]);

      return redirect("barang")->with('success', 'Data Berhasil Disimpan');
  }

  public function edit(barang $barang)
{
  if (Auth::check()) {
  $upload =Upload::all();
    $count = Upload::where('status','Pending')->get()->count();
    return view('admin.barang.edit', compact('barang','upload','count'));
  }
  return redirect("login")->withSuccess('You are not allowed to access');
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, barang $barang)
{
  $this->validate($request, [
    'nama_barang' => 'required|min:3',
        'harga_barang' => 'required|min:3',
        'stok' => 'required|min:1'
  ]);

    //update upload with new image
    $barang->update([
      'nama_barang' => $request->nama_barang,
      'harga_barang' => $request->harga_barang,
      'stok' => $request->stok,
    ]);

//redirect to index
return redirect("barang")->with(['success' => 'Data Berhasil Diubah!']);
}
  public function destroy(Barang $barang)
    {

        //delete post
        $barang->delete();

        //redirect to index
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function Excelbarang()
    {
        return Excel::download(new ExportBarang, 'validate-data.xlsx');
    }
    //$tanggal = date('Y-m-d',strtotime($request->tanggal));
    //$data = Laporan::whereDate('created_at',$tanggal)->get();

public function pdfbarang()
  {
    $barang = Barang::all();
    $banyak_barang = Barang::orderBy('stok', 'desc')->first();
    $dikit_barang = Barang::orderBy('stok', 'asc')->first();
    // $tenants = Tenant::all();
    $pdf = PDF::loadView('admin.barang.pdfbarang', compact('barang','banyak_barang','dikit_barang'));
    return $pdf->download('Databarang.pdf');
  }
  public function exportPDF(Request $request)
  {
    $banyak_barang = Barang::orderBy('stok', 'desc')->first();
    $dikit_barang = Barang::orderBy('stok', 'asc')->first();
      $month = $request->input('month');
      
      // Konversi nilai bulan menjadi Carbon instance
      $carbonMonth = Carbon::createFromFormat('!m', $month);
      
      // Filter data berdasarkan bulan yang dipilih
      $barang = Barang::whereMonth('created_at', $carbonMonth->month)->get();

      // Buat PDF menggunakan DOMPDF
      $pdf = PDF::loadView('admin.barang.pdfbarang', compact('barang','banyak_barang','dikit_barang'));

      // Simpan PDF ke file
      $filename = 'data_' . $carbonMonth->format('Y-m') . '.pdf';
      // $pdf->save(public_path('pdf/' . $filename));

      // // Tampilkan link untuk mengunduh PDF
      // return '<a href="' . asset('pdf/' . $filename) . '">Download PDF</a>';
      return $pdf->download('Databarang.pdf/'.$filename);

  }
  public function exportPDFtgl(Request $request)
  {
      $start_date = $request->input('start_date');
      $end_date = $request->input('end_date');

    //   $banyak_barang = Barang::whereBetween('created_at', [$start_date, $end_date])->orderBy('stok', 'desc')->first();
    // $dikit_barang = Barang::whereBetween('created_at', [$start_date, $end_date])->orderBy('stok', 'asc')->first();

      // Filter data berdasarkan rentang tanggal yang diberikan
      $banyak_barang = Barang::orderBy('stok', 'desc')->first();
    $dikit_barang = Barang::orderBy('stok', 'asc')->first();
      $nota = Nota::whereBetween('created_at', [$start_date, $end_date])->get();
      $barang = Barang::all();

      // Buat PDF menggunakan DOMPDF
      $pdf = PDF::loadView('admin.barang.pdfbarang', compact('barang','nota','banyak_barang','dikit_barang'));

      // Simpan PDF ke file
      $filename = 'data_' . date('Y-m-d_H-i-s') . '.pdf';
      return $pdf->download('Databarang.pdf/'.$filename);

      // $pdf->save(public_path('pdf/' . $filename));

      // // Tampilkan link untuk mengunduh PDF
      // return redirect('barang')->with('filename', $filename);
  }
}