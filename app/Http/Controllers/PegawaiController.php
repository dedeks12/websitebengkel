<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Upload;
use Dompdf\Adapter\PDFLib;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportPegawai;
use Barryvdh\DomPDF\Facade\Pdf;

class PegawaiController extends Controller
{
    public function index()
    {
        //get posts
        $pegawai = Pegawai::latest()->paginate(5);
        $upload = upload::latest()->paginate(5);
        $count = Upload::where('status','Pending')->get()->count();

        //render view with posts
        return view('admin.pegawai.index', compact('pegawai','count','upload'));
    }

    public function create()
    {
      if (Auth::check()) {
      $upload = upload::latest()->paginate(5);
        $count = Upload::where('status','Pending')->get()->count();
        return view('admin.pegawai.create', compact('count','upload'));
    }
        return redirect("login")->withSuccess('You are not allowed to access');

    }

    public function store(Request $request)
    {
    $this->validate($request, [
      'nama_pegawai' => 'required|min:3',
      'gaji' => 'required|min:3',
      'alamat' => 'required|min:3',
      'no_ktp' => 'required|min:3',

      ]);

      $pegawai = pegawai::create([
        'nama_pegawai' => $request->nama_pegawai,
        'gaji' => $request->gaji,
        'alamat' => $request->alamat,
        'no_ktp' => $request->no_ktp
      ]);

      return redirect("pegawai")->with(['success' => 'Data Berhasil Disimpan!']);
    }
  
  public function edit(Pegawai $pegawai)
    {
      if (Auth::check()) {
      $upload = Upload::all();
        $count = Upload::where('status','Pending')->get()->count();
        return view('admin.pegawai.edit', compact('pegawai','upload','count'));
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
    public function update(Request $request, $id)
    {
      $pegawai = Pegawai::findorfail($id);
      $this->validate($request, [
        'nama_pegawai' => 'required|min:3',
        'gaji' => 'required|min:3',
        'alamat' => 'required|min:3',
        'no_ktp' => 'required|min:3',
      ]);
        //update upload without image
        $pegawai->update([
          'nama_pegawai' => $request->nama_pegawai,
          'gaji' => $request->gaji,
          'alamat' => $request->alamat,
          'no_ktp' => $request->no_ktp,
        ]);
        return redirect("pegawai")->with(['success' => 'Data Berhasil Diubah!']);

  }

    public function destroy(Pegawai $pegawai)
    {
        //delete post
        $pegawai->delete();

        //redirect to index
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function Excelpegawai()
    {
        return Excel::download(new ExportPegawai, 'validate-data.xlsx');
    }
    //$tanggal = date('Y-m-d',strtotime($request->tanggal));
    //$data = Laporan::whereDate('created_at',$tanggal)->get();

public function pdfpegawai()
  {
    $pegawai = pegawai::all();
    $banyak_pegawai = Pegawai::orderBy('gaji', 'desc')->first();
    $dikit_pegawai = Pegawai::orderBy('gaji', 'asc')->first();
    $total_pegawai = Pegawai::all()->count();
    // $tenants = Tenant::all();
    $pdf = PDF::loadView('admin.pegawai.pegawaipdf', compact('pegawai','banyak_pegawai','dikit_pegawai','total_pegawai'));
    return $pdf->download('Datapegawai.pdf');
  }
}
