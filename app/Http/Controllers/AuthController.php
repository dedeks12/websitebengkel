<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Nota;
use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\Jasa;
use App\Models\Servis;
use App\Models\Upload;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Session as FacadesSession;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
        }

        return redirect("login")->with('warning', 'akun belum aktif');
    }

    public function registration()
    {
        return view('admin.auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => FacadesHash::make($data['password'])
        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            $today = Carbon::now()->format('Y-m-d');

            $servisCount = Servis::whereDate('tanggal', $today)->count();
            $today_nota = Nota::whereDate('created_at', $today)->count();


            $total_servis = Servis::all()->count();
            $nota = Nota::all()->count();
            $jumlahPending = Nota::where('status', 'Lunas')->count();
            // $persentaselunas = round(($jumlahPending / $nota) * 100, 0);


            $totalupload = Upload::all()->count();
            $barang = Barang::all();
            $pegawai = Pegawai::all()->count();
            $jasa = Jasa::all()->count();
            $upload = upload::latest()->paginate(5);
            $count = Upload::where('status', 'Pending')->get()->count();
            $totalbarang =  Barang::all()->count();
            $totalpegawai =  Pegawai::all()->count();




            return view('admin.dashboard', compact('today_nota', 'servisCount', 'total_servis', 'totalupload', 'nota', 'barang', 'pegawai', 'jasa', 'upload', 'count', 'totalbarang'));
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function nota()
    {
        if (Auth::check()) {
            $nota = Nota::all();
            $barang = Barang::all();
      $pegawai = Pegawai::all();
      $jasa = Jasa::all();
      $upload = upload::latest()->paginate(5);
      $servis = servis::all();
      $count = Upload::where('status', 'Pending')->get()->count();
            // $nota_id = Nota::all()->first();
            // $totalbarang = 0;
            // foreach ($nota_id->barang as $barangs) {
            //     $harga = $barangs->harga_barang;
            //     $jumlah = $barangs->pivot->jumlah;

            //     if ($jumlah > 1) {
            //         $subtotal = $harga * $jumlah;
            //         $totalbarang += $subtotal;
            //     }
            // }

            // $totalJasa = 0;
            // foreach ($nota_id->servis->jasa as $jasas) {
            //     $hargaJasa = $jasas->harga_jasa_servis;
            //     $totalJasa += $hargaJasa;
            // }
            // $total = $totalbarang + $totalJasa;

            return view('admin.nota.index', compact('nota', 'servis', 'barang', 'pegawai', 'jasa', 'upload', 'count'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }


    public function barang()
    {
        if (Auth::check()) {
            $barang = Barang::all();
            $upload = upload::latest()->paginate(5);
            $count = Upload::where('status', 'Pending')->get()->count();
            return view('admin.barang.index', compact('barang', 'upload', 'count'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function pegawai()
    {
        if (Auth::check()) {
            $pegawai = Pegawai::all();
            $upload = upload::latest()->paginate(5);
            $count = Upload::where('status', 'Pending')->get()->count();
            return view('admin.pegawai.index', compact('pegawai', 'upload', 'count'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function jasa()
    {
        if (Auth::check()) {
            $jasa = Jasa::all();
            $upload = upload::latest()->paginate(5);
            $count = Upload::where('status', 'Pending')->get()->count();
            return view('admin.jasa.index', compact('jasa', 'upload', 'count'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function upload()
    {
        if (Auth::check()) {
            $upload = upload::all();
            $count = Upload::where('status', 'Pending')->get()->count();
            return view('admin.upload.index', compact('upload', 'count'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        FacadesSession::flush();
        Auth::logout();

        return Redirect('login');
    }
}
