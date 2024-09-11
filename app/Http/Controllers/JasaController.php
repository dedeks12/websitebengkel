<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JasaController extends Controller
{
    public function index()
    {
        //get posts
        $jasa = Jasa::latest()->paginate(5);
        $upload = upload::latest()->paginate(5);
        $count = Upload::where('status','Pending')->get()->count();

        //render view with posts
        return view('admin.jasa.index', compact('jasa','count','upload'));
    }

    public function create()
    {
      if (Auth::check()) {
      $upload = upload::latest()->paginate(5);
        $count = Upload::where('status','Pending')->get()->count();
        return view('admin.jasa.create', compact('count','upload'));
      }
      return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function store(Request $request)
    {
    $this->validate($request, [
        'nama_jasa_servis' => 'required|min:3',
        'harga_jasa_servis' => 'required|min:3',

      ]);

      $jasa = jasa::create([
        'nama_jasa_servis' => $request->nama_jasa_servis,
        'harga_jasa_servis' => $request->harga_jasa_servis,
        'slug' => Str::slug($request->nama_jasa_servis)
      ]);

      return redirect("jasa")->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

  public function edit(Jasa $jasa)
    {
      if (Auth::check()) {
      $upload =Upload::all();
        $count = Upload::where('status','Pending')->get()->count();
        return view('admin.jasa.edit', compact('jasa','upload','count'));
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
    public function update(Request $request, Jasa $jasa)
    {
      $this->validate($request, [
        'nama_jasa_servis' => 'required|min:3',
        'harga_jasa_servis' => 'required|min:3',
      ]);
  
        //update upload with new image
        $jasa->update([
          'nama_jasa_servis' => $request->nama_jasa_servis,
          'harga_jasa_servis' => $request->harga_jasa_servis,
          'slug' => Str::slug($request->nama_jasa_servis),
        ]);

    //redirect to index
    return redirect("jasa")->with(['success' => 'Data Berhasil Diubah!']);
  }

  public function destroy(Jasa $jasa)
    {

        //delete post
        $jasa->delete();

        //redirect to index
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
