<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Servis;
use App\Models\Nota;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServisController extends Controller
{
    public function index()
    {
        //get posts
        $servis = servis::all();
        $jasa = Jasa::all();
        $upload = upload::latest()->paginate(5);
        $count = Upload::where('status', 'Pending')->get()->count();

        //render view with posts
        return view('admin.servis.index', compact('servis', 'count', 'upload', 'jasa'));
    }

    public function create()
    {
        if (Auth::check()) {
            $jasa = Jasa::all();
            $nota = Nota::all();
            $upload = upload::latest()->paginate(5);
            $count = Upload::where('status', 'Pending')->get()->count();
            return view('admin.servis.create', compact('count', 'upload', 'jasa', 'nota'));
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|min:3',
            'pelanggan' => 'required|min:3',
            'tanggal' => 'required|min:3',
            'plat' => 'required|min:3',
            'telepon' => 'required|min:3',
            'nama_jasa' => 'required|array',

        ]);

        $servis = servis::create([
            'status' => $request->status,
            'pelanggan' => $request->pelanggan,
            'tanggal' => $request->tanggal,
            'plat' => $request->plat,
            'telepon' => $request->telepon,


        ]);
        // $servis->jasa()->attach($request->jasa);
        $datajasa = $request->input('nama_jasa');
        $namajasa = []; // Array untuk menyimpan nama barang yang sudah ada


        // memberikan inisial kepada data barang yang diinput menjadi index dan sesuai dengan id barang
        foreach ($datajasa as $id) {
            $jasa = Jasa::findorfail($id);

            if (!$jasa) {
                return redirect()->back()->with('error', 'Barang tidak ditemukan.');
            }

            // Periksa apakah nama barang sudah ada sebelumnya
            if (in_array($jasa->nama_jasa_servis, $namajasa)) {
                return redirect()->back()->with('error', 'Nama barang tidak boleh sama.');
            }

            // Tambahkan nama barang ke array
            $namajasa[] = $jasa->nama_jasa_servis;

            $servis->jasa()->attach($jasa);
        }


        return redirect("servis")->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function edit($id)
    {
        if (Auth::check()) {
            $servis = Servis::findOrFail($id);
            $upload = Upload::all();
            $count = Upload::where('status', 'Pending')->get()->count();
            $jasa = Jasa::all();
            return view('admin.servis.edit', compact('servis', 'upload', 'count', 'jasa'));
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
        $servis = Servis::findorfail($id);
        $this->validate($request, [
            'status' => 'required|min:3',
            'pelanggan' => 'required|min:3',
            'tanggal' => 'required|min:3',
            'plat' => 'required|min:3',
            'telepon' => 'required|min:3',
        ]);

        $datajasa = $request->input('jasa');


        //update upload with new image
        $servis->update([
            'status' => $request->status,
            'pelanggan' => $request->pelanggan,
            'tanggal' => $request->tanggal,
            'plat' => $request->plat,
            'telepon' => $request->telepon,

        ]);
        // Mencari dan menyimpan pegawai-pegawai yang baru
        $jasabaru = [];

        foreach ($datajasa as $jasaid) {
            $jasa = Jasa::find($jasaid);

            if (!$jasa) {
                return redirect()->back()->with('error', 'Pegawai tidak ditemukan.');
            }

            $jasabaru[] = $jasaid;
        }

        // Update relasi many-to-many antara nota dan pegawai
        $servis->jasa()->sync($jasabaru);

        //redirect to index
        return redirect("servis")->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        // Hapus data dari tabel Nota berdasarkan servis_id yang sesuai
        Nota::where('servis_id', $id)->delete();

        // Hapus data dari tabel Servis
        Servis::destroy($id);
        // $servis = Servis::findOrFail($id);

        // //delete post
        // $servis->delete();

        //redirect to index
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function ubahstatus(Request $request, $id)
    {
        $update_servis = Servis::findorfail($id);
        // $update_nota->nama_jasa_servis = $request->updateHarga;
        $update_servis->status = $request->updateStatus;
        $update_servis->save();
        return redirect()->back()->with('success', 'Status Servis Berhasil Diubah');
    }


    public function kirimservis($id)
    {
        $servis = Servis::findorfail($id);
        $jasa = Jasa::all();
        $upload = Upload::all();
        $count = Upload::where('status', 'Pending')->get()->count();
        return view('admin.servis.form-wa', compact('servis', 'jasa', 'upload', 'count'));
    }

    public function cari_servis()
    {
         // $servis = Servis::whereIn('status', $statuses)->get();
        $statuses = ['Pending','Confirm', 'Working', 'Done'];
        $servis = Servis::whereIn('status', $statuses)->get();
        return view('home', compact('servis'));
    }
}
