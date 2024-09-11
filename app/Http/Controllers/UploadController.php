<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportPegawai;
use App\Exports\ExportTransfer;
use Barryvdh\DomPDF\Facade\Pdf;

class UploadController extends Controller
{
    public function index()
    {
        //get upload
        $upload = upload::latest()->paginate(5);
        //$upload = upload::where('status','Pending')::count();
        $count = Upload::where('status', 'Pending')->get()->count();
        //$jasa = Jasa::all();
        //render view with upload
        return view('admin.upload.index', compact('upload', 'count'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $count = Upload::where('status', 'Pending')->get()->count();
        return view('user.upload.create', compact('count'));
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama'   => 'required|min:10',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg,jfif|max:5000',
            'telepon'     => 'required|min:11',
            'tanggal'     => 'required|min:5',
            'plat'     => 'required|min:3',
            'alamat'   => 'required|min:10',
            'status'   => 'min:5'

        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/upload', $image->hashName());

        //create upload
        upload::create([
            'nama'     => $request->nama,
            'image'     => $image->hashName(),
            'telepon'     => $request->telepon,
            'plat'     => $request->plat,
            'tanggal'     => $request->tanggal,
            'alamat'   => $request->alamat,
            'status'   => $request->status

        ]);

        //redirect to index
        return redirect()->back()->with(['success' => 'Data Berhasil Ditambahkan!']);
    }
    public function edit(Upload $upload)
    {
        if (Auth::check()) {
            $count = Upload::where('status', 'Pending')->get()->count();
            return view('admin.upload.edit', compact('upload', 'count'));
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
    public function update(Request $request, Upload $upload)
    {
        $this->validate($request, [
            'nama'   => 'required|min:10',
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:5000',
            'telepon'     => 'required|min:11',
            'plat'     => 'required|min:3',
            'alamat'   => 'required|min:5',
            'alamat'   => 'required|min:10',
            'status'   => 'min:5'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/upload', $image->hashName());

            //delete old image
            Storage::delete('public/upload/' . $upload->image);

            //update upload with new image
            $upload->update([
                'nama'     => $request->nama,
                'image'     => $image->hashName(),
                'telepon'     => $request->telepon,
                'plat'     => $request->plat,
                'tanggal'   => $request->tanggal,
                'alamat'   => $request->alamat,
                'status'   => $request->status
            ]);
        } else {

            //update upload without image
            $upload->update([
                'nama'     => $request->nama,
                'telepon'     => $request->telepon,
                'alamat'   => $request->alamat,
                'status'   => $request->status
            ]);
        }

        //redirect to index
        return redirect("upload")->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy(Upload $upload)
    {

        //delete upload
        $upload->delete();

        //redirect to index
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function Excelbuktitransfer()
    {
        return Excel::download(new ExportTransfer, 'validate-data.xlsx');
    }
    //$tanggal = date('Y-m-d',strtotime($request->tanggal));
    //$data = Laporan::whereDate('created_at',$tanggal)->get();

    public function pdfbuktitransfer()
    {
        $upload = upload::all();
        $total_upload = upload::all()->count();
        // $tenants = Tenant::all();
        $pdf = PDF::loadView('admin.upload.pdfbtransfer', compact('upload','total_upload'));
        return $pdf->download('Datatransfer.pdf');
    }
    public function ubahstatus(Request $request, $id)
    {
        $upload = upload::findorfail($id);
        // $update_nota->nama_jasa_servis = $request->updateHarga;
        $upload->status = $request->updateStatus;
        $upload->save();
        return redirect('upload')->with('success', 'Status Bukti Transfer Berhasil Diubah');
    }
}
