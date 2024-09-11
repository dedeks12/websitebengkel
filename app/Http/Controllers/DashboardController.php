<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Nota;
use App\Models\Pegawai;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;




class DashboardController extends Controller
{
    public function dashboard()
    {
        // //get posts
        // $totalPegawai = Pegawai::where('status','Pending')->get()->count();
        // $pegawaiDenganNota = Pegawai::has('nota')->count();
        
        // $persentaseKeaktifan = ($pegawaiDenganNota / $totalPegawai) * 100;  
        
        // $count = Upload::where('status','Pending')->get()->count();
        // $user = Auth::user();

        // // Perform actions based on the user, such as retrieving related data from the database
        // $data = User::where('id', $user->id)->get();
    
        // return view('admin.dashboard', compact('data'));
        // $totalbarang = Barang::count();

        // //render view with posts
        //return view('admin.dashboard', compact('count','totalbarang'));
    }
}
