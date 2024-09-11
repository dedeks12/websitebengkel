<?php

namespace App\Http\Controllers;

use App\Exports\ExportNota;
use App\Exports\ExportNota_Bulan;
use App\Models\Nota;
use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\Jasa;
use App\Models\servis;
use App\Models\Upload;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class NotaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //get notas
    $nota = Nota::all();
    $servis = servis::all();
    // $servis = servis::findorfail($id);
    $upload = upload::latest()->paginate(5);
    $count = Upload::where('status', 'Pending')->get()->count();

    //render view with notas
    return view('admin.nota.index', compact('servis', 'nota', 'count', 'upload', 'total'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    if (Auth::check()) {
      // $statuses = ['Confirm', 'Working', 'Done'];

      // $servis = Servis::whereIn('status', $statuses)->get();
      $statuses = ['Confirm', 'Working', 'Done'];

      // Mengambil daftar ID servis yang sudah terhubung dengan nota
      $usedServisIds = Nota::pluck('servis_id')->all();

      // Mengambil data servis yang belum terhubung dengan nota
      $servis = Servis::whereIn('status', $statuses)
        ->whereNotIn('id', $usedServisIds)
        ->get();

      $barang = Barang::all();
      $pegawai = Pegawai::all();
      $jasa = Jasa::all();
      $upload = upload::latest()->paginate(5);
      $count = Upload::where('status', 'Pending')->get()->count();
      return view('admin.nota.create', compact('barang', 'pegawai', 'jasa', 'upload', 'count', 'servis'));
    }
    return redirect("login")->withSuccess('You are not allowed to access');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function store(Request $request)
  {
    // Validasi input
    $this->validate($request, [
      'pelanggan' => 'required',
      'telepon' => 'required',
      'status' => 'required',
      'servis_id' => 'required',
    ]);

    // Mulai transaksi
    DB::beginTransaction();

    try {
      // Buat entitas Nota
      $nota = Nota::create([
        'pelanggan' => $request->pelanggan,
        'telepon' => $request->telepon,
        'status' => $request->status,
        'servis_id' => $request->servis_id,
        'jumlah' => $request->jumlah,
        'harga' => $request->harga,
      ]);

      // Hubungkan pegawai dengan nota
      $nota->pegawai()->attach($request->pegawai);

      // Iterasi melalui item barang
      $dataBarang = $request->input('barang');
      $dataJumlah = $request->input('jumlah');
      // $dataHarga = $request->input('harga');
      $barangNames = []; // Array untuk menyimpan nama barang yang sudah ada


      if (count($dataBarang) !== count($dataJumlah)) {
        return redirect()->back()->with('error', 'Data barang tidak valid.');
      }

      foreach ($dataBarang as $index => $id) {
        $jumlah = $dataJumlah[$index];
        // $harga = $dataHarga[$index];
        $barang = Barang::findorfail($id);

        if (!$barang) {
          return redirect()->back()->with('error', 'Barang tidak ditemukan.');
        }

        // Periksa apakah nama barang sudah ada sebelumnya
        if (in_array($barang->nama_barang, $barangNames)) {
          return redirect()->back()->with('error', 'Nama barang tidak boleh sama.');
        }

        // // Periksa apakah jumlah yang diminta melebihi stok yang ada
        // if ($barang->stok < $jumlah) {
        //   return redirect()->back()->with('error', 'Stok barang tidak mencukupi.');
        // }
        // Tambahkan nama barang ke array
        $barangNames[] = $barang->nama_barang;

        // // Update stok barang
        // $barang->stok -= $jumlah;
        // $barang->save();

        // $nota->barang()->attach($barang, ['jumlah' => $jumlah, 'harga' => $harga]);
        $nota->barang()->attach($barang, ['jumlah' => $jumlah]);
      }

      // Commit transaksi jika berhasil
      DB::commit();

      return redirect("nota")->with('success', 'Data Berhasil Disimpan');
    } catch (\Exception $e) {
      // Rollback transaksi jika terjadi kesalahan
      DB::rollback();

      // Tangani kesalahan jika diperlukan
      return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
    }
  }
  public function pdf($id)
  {
    $nota = Nota::findOrFail($id);
    $totalbarang = 0;
    foreach ($nota->barang as $barangs) {
      $harga = $barangs->harga_barang;
      $jumlah = $barangs->pivot->jumlah;

      if ($jumlah > 1) {
        $subtotal = $harga * $jumlah;
        $totalbarang += $subtotal;
      } else {
        $subtotal = $harga * $jumlah;
        $totalbarang += $subtotal;
      }
    }

    $totalJasa = 0;
    foreach ($nota->servis->jasa as $jasas) {
      if (isset($jasas->harga_jasa_servis)) {
        $hargaJasa = $jasas->harga_jasa_servis;
        $totalJasa += $hargaJasa;
      } else {
        // Memberikan nilai default jika harga_jasa_servis tidak ada
        $hargaJasa = 0; // Atau nilai default lainnya
        $totalJasa += $hargaJasa;
      }
    }


    $total = $totalbarang + $totalJasa;
    $pdf = PDF::loadView('admin.nota.notapdf', compact('nota', 'total'));
    $dataId = $nota->pelanggan; // Ubah ini sesuai dengan bagaimana Anda mendapatkan ID dari data

    // Membuat nama file berdasarkan ID
    $filename = 'Nota_' . $dataId . '.pdf';
    return $pdf->download($filename);
  }

  public function edit($id)
  {
    if (Auth::check()) {
      $nota = Nota::findorfail($id);
      $barang = Barang::all();
      $pegawai = Pegawai::all();
      $jasa = Jasa::all();
      $upload = upload::latest()->paginate(5);
      $servis = servis::all();
      $count = Upload::where('status', 'Pending')->get()->count();
      return view('admin.nota.edit', compact('nota', 'servis', 'barang', 'pegawai', 'jasa', 'upload', 'count'));
    }
    return redirect("login")->withSuccess('You are not allowed to access');
  }

  public function kirimnota($id)
  {
    if (Auth::check()) {
      $nota = Nota::findorfail($id);
      $barang = Barang::all();
      $pegawai = Pegawai::all();
      $jasa = Jasa::all();
      $upload = upload::latest()->paginate(5);
      $servis = servis::all();
      $count = Upload::where('status', 'Pending')->get()->count();
      return view('admin.nota.form-wa', compact('nota', 'servis', 'barang', 'pegawai', 'jasa', 'upload', 'count'));
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
    $this->validate($request, [
      'pelanggan' => 'required',
      'telepon' => 'required',
      'status' => 'required',
      'servis_id' => 'required',
    ]);

    $nota = Nota::findorfail($id);

    $data_nota = [
      'pelanggan' => $request->pelanggan,
      'telepon' => $request->telepon,
      'status' => $request->status,
      'servis_id' => $request->servis_id,
    ];

    $dataBarang = $request->input('barang');
    $dataJumlah = $request->input('jumlah');
    $dataPegawai = $request->input('pegawai');
    // $dataHarga = $request->input('harga');
    $barangNames = []; // Array untuk menyimpan nama barang yang sudah ada

    // Pastikan jumlah barang dan data barang sesuai
    if (count($dataBarang) !== count($dataJumlah)) {
      return redirect()->back()->with('error', 'Data barang tidak valid.');
    }

    // Mencari dan menyimpan barang-barang yang baru
    $barangsBaru = [];

    foreach ($dataBarang as $index => $barangId) {
      $jumlah = $dataJumlah[$index];
      // $harga = $dataHarga[$index];
      $barang = Barang::find($barangId);

      if (!$barang) {
        return redirect()->back()->with('error', 'Barang tidak ditemukan.');
      }
      // Periksa apakah nama barang sudah ada sebelumnya
      if (in_array($barang->nama_barang, $barangNames)) {
        return redirect()->back()->with('error', 'Nama barang tidak boleh sama.');
      }

      // Tambahkan nama barang ke array
      $barangNames[] = $barang->nama_barang;

      $barangsBaru[$barangId] = ['jumlah' => $jumlah];
      // $barangsBaru[$barangId] = ['jumlah' => $jumlah, 'harga' => $harga];
    }

    // Mencari dan menyimpan pegawai-pegawai yang baru
    $pegawaisBaru = [];

    foreach ($dataPegawai as $pegawaiId) {
      $pegawai = Pegawai::find($pegawaiId);

      if (!$pegawai) {
        return redirect()->back()->with('error', 'Pegawai tidak ditemukan.');
      }

      $pegawaisBaru[] = $pegawaiId;
    }

    // Update relasi many-to-many antara nota dan barang
    $nota->barang()->sync($barangsBaru);

    // Update relasi many-to-many antara nota dan pegawai
    $nota->pegawai()->sync($pegawaisBaru);

    // Update data nota jika diperlukan
    $nota->update($data_nota);

    return redirect("nota")->with('success', 'Data Berhasil Diubah');
  }

  public function destroy($id)
  {
    $nota = Nota::findorfail($id);
    $nota->delete();

    return redirect()->back()->with('success', 'Data Berhasil Dihapus');
  }

  public function ubahstatus(Request $request, $id)
  {
    $nota = Nota::findorfail($id);
    // $update_nota->nama_jasa_servis = $request->updateHarga;
    $nota->status = $request->updateStatus;
    $nota->save();
    return redirect('nota')->with('success', 'Status Nota Berhasil Diubah');
  }

  public function offline($id)
  {
    $upload = upload::latest()->paginate(5);
    $count = Upload::where('status', 'Pending')->get()->count();
    $nota = Nota::findorfail($id);
    $totalbarang = 0;
    foreach ($nota->barang as $barangs) {
      $harga = $barangs->harga_barang;
      $jumlah = $barangs->pivot->jumlah;

      if ($jumlah > 1) {
        $subtotal = $harga * $jumlah;
        $totalbarang += $subtotal;
      } else {
        $subtotal = $harga * $jumlah;
        $totalbarang += $subtotal;
      }
    }

    $totalJasa = 0;
    foreach ($nota->servis->jasa as $jasas) {
      $hargaJasa = $jasas->harga_jasa_servis;
      $totalJasa += $hargaJasa;
    }

    $total = $totalbarang + $totalJasa;

    return view('admin.nota.pembayaran_offline', compact('nota', 'count', 'upload', 'total'));
  }

  public function previewnota($id)
  {
    $nota = Nota::find($id);
    $barang = Barang::all();
    $pegawai = Pegawai::all();
    $jasa = Jasa::all();
    // $servisId = $nota->servis_id; // Ambil servis_id dari nota

    // // Ambil data jasa berdasarkan servis_id
    // $jasa = Servis::findorfail($servisId)->jasa; // Assumsi Anda memiliki relasi jasa di model Servis

    $totalbarang = 0;
    foreach ($nota->barang as $barangs) {
      $harga = $barangs->harga_barang;
      $jumlah = $barangs->pivot->jumlah;

      if ($jumlah > 1) {
        $subtotal = $harga * $jumlah;
        $totalbarang += $subtotal;
      } else {
        $subtotal = $harga * $jumlah;
        $totalbarang += $subtotal;
      }
    }

    $totalJasa = 0;
    foreach ($nota->servis->jasa as $jasas) {
      if (isset($jasas->harga_jasa_servis)) {
        $hargaJasa = $jasas->harga_jasa_servis;
        $totalJasa += $hargaJasa;
      } else {
        // Memberikan nilai default jika harga_jasa_servis tidak ada
        $hargaJasa = 0; // Atau nilai default lainnya
        $totalJasa += $hargaJasa;
      }
    }


    $total = $totalbarang + $totalJasa;
    return view('admin.nota.notapdf', compact('nota', 'barang', 'pegawai', 'jasa', 'total'));
  }
  public function pdfnota()
  {
    $nota = Nota::all();
    $total_nota = Nota::all()->count();
    $barang = Barang::all();
    $pegawai = Pegawai::all();
    $jasa = Jasa::all();
    $upload = upload::latest()->paginate(5);
    $count = Upload::where('status', 'Pending')->get()->count();

    $pdf = PDF::loadView('admin.nota.datanotapdf', compact('nota', 'barang', 'pegawai', 'jasa', 'total_nota'));
    return $pdf->download('Databarang.pdf');
  }


  public function Excelnota()
  {
    // Ambil data nota dari database dengan relasi many-to-many
    // $notas = Nota::with('barang', 'servis.jasa')->get();
    $notas = Nota::all();

    // Buat array untuk menyimpan data yang akan diekspor
    $data = [];
    // Inisialisasi variabel bantuan untuk menghitung jumlah barang dan jenis jasa
    $countBarang = 0;
    $countJasa = 0;
    // Tambahkan data nota, barang, jasa, dan total harga ke array
    // Loop melalui setiap nota
    foreach ($notas as $nota) {
      // Buat array untuk menyimpan data nota dan total harga
      $notaData = [
        'Nama Pelanggan' => $nota->pelanggan,
        'Status' => $nota->status,
        'Tanggal' => $nota->created_at,
        'Total Harga' => 0, // Inisialisasi total harga dengan 0
      ];


      foreach ($nota->barang as $barangs) {
        // Hitung total harga berdasarkan harga barang dan harga jasa dikalikan jumlah
        $totalHargaBarang = $barangs->harga_barang * $barangs->pivot->jumlah;

        // Jika harga barang lebih dari 1, tambahkan ke jumlah barang
        if ($totalHargaBarang > 1) {
          $countBarang += 1;
        }
      }

      foreach ($nota->servis->jasa as $jasas) {
        // Hitung total harga jasa
        $totalHargaJasa = $jasas->harga_jasa_servis;

        // Jika harga jasa lebih dari 1, tambahkan ke jumlah jasa
        if ($totalHargaJasa > 1) {
          $countJasa += 1;
        }
      }

      // Hanya tambahkan data jika jumlah barang dan jenis jasa lebih dari 1
      if ($countBarang > 1 && $countJasa > 1) {
        // Hitung ulang total harga berdasarkan harga barang dan harga jasa dikalikan jumlah
        $totalHargaBarang = 0;
        $totalHargaJasa = 0;

        foreach ($nota->barang as $barangs) {
          $totalHargaBarang += $barangs->harga_barang * $barangs->pivot->jumlah;
        }

        foreach ($nota->servis->jasa as $jasas) {
          $totalHargaJasa += $jasas->harga_jasa_servis;
        }

        $totalHarga = $totalHargaBarang + $totalHargaJasa;

        // Tambahkan total harga ke total harga nota
        $notaData['Total Harga'] += $totalHarga;
      } else {
        $totalHargaBarang = $barangs->harga_barang * $barangs->pivot->jumlah;
        $totalHargaJasa = $jasas->harga_jasa_servis;

        // Hanya tambahkan data jika harga barang dan harga jasa lebih dari 1
        $totalHarga = $totalHargaBarang + $totalHargaJasa;

        // Tambahkan total harga ke total harga nota
        $notaData['Total Harga'] += $totalHarga;
      }
      $data[] = $notaData;
    }

    // Export data ke Excel
    // return Excel::download(function ($excel) use ($data) {
    //     $excel->sheet('Sheet 1', function ($sheet) use ($data) {
    //         $sheet->fromArray($data, null, 'A1', false, false);
    //     });
    // }, 'Data Nota.xlsx');


    // return Excel::download(new ExportNota($data), 'validate-data.xlsx');
    // Export data ke Excel
    return Excel::download(new ExportNota($data), 'DataNota.xlsx');
  }
  public function exportPDFtgl(Request $request)
  {
    // $start_date = $request->input('start_date');
    // $end_date = $request->input('end_date');

    // $total_nota = Nota::whereBetween('created_at', [$start_date, $end_date])->count();
    // $nota = Nota::whereBetween('created_at', [$start_date, $end_date])->get();
    // $barang = Barang::all();
    $start_date = Carbon::parse($request->input('start_date'))->startOfDay();
    $end_date = Carbon::parse($request->input('end_date'))->endOfDay();

    // Inisialisasi query builder
    $notaQuery = Nota::query();

    if (!empty($start_date) && !empty($end_date)) {
      $notaQuery->whereBetween('created_at', [$start_date, $end_date]);
      $filename = 'DataNota_' . $start_date . '_to_' . $end_date;
    } elseif (!empty($start_date)) {
      $notaQuery->where('created_at', '>=', $start_date);
      $filename = 'DataNota_From_' . $start_date;
    } elseif (!empty($end_date)) {
      // Ambil data nota dengan tanggal yang lebih kecil atau sama dengan end date
      $notaQuery->where('created_at', '<=', $end_date);
      $filename = 'DataNota_until_' . $end_date;
    } else {
      // Jika kedua tanggal kosong, ambil semua data
      $allData = true;
      $filename = 'AllDataNota';
    }

    $total_nota = $notaQuery->count();
    $nota = $notaQuery->get();
    $barang = Barang::all();


    // Buat PDF menggunakan DOMPDF
    $pdf = PDF::loadView('admin.nota.datanotapdf', compact('nota', 'barang', 'total_nota'));

    // Simpan PDF ke file
    return $pdf->download($filename . '.pdf');

    // $pdf->save(public_path('pdf/' . $filename));

    // // Tampilkan link untuk mengunduh PDF
    // return redirect('barang')->with('filename', $filename);
  }
  // }
  public function exportExceltgl(Request $request)
  {
    $startDate = Carbon::parse($request->input('start_date'))->startOfDay();
    $endDate = Carbon::parse($request->input('end_date'))->endOfDay();

    // Ambil data nota dari database dengan relasi many-to-many
    // $notas = Nota::with('barang', 'servis.jasa')->get();
    // $nota = Nota::all();
    // $notas = Nota::whereBetween('created_at', [$startDate, $endDate])->get();
    if (empty($startDate) && empty($endDate)) {
      // Ambil semua data nota dari database
      $notas = Nota::all();
      $filename = 'all_data';
    } elseif (!empty($startDate) && empty($endDate)) {
      // Ambil data nota dengan tanggal yang lebih besar atau sama dengan start date
      $notas = Nota::where('created_at', '>=', $startDate)->get();
      $filename = 'data_from_' . $startDate;
    } elseif (empty($startDate) && !empty($endDate)) {
      // Ambil data nota dengan tanggal yang lebih kecil atau sama dengan end date
      $notas = Nota::where('created_at', '<=', $endDate)->get();
      $filename = 'data_until_' . $endDate;
    } elseif (!empty($startDate) && !empty($endDate)) {
      // Ambil data nota di antara start date dan end date
      $notas = Nota::whereBetween('created_at', [$startDate, $endDate])->get();
      $filename = 'data_' . $startDate . '_to_' . $endDate;
    }

    // Buat array untuk menyimpan data yang akan diekspor
    $data = [];
    // Inisialisasi variabel bantuan untuk menghitung jumlah barang dan jenis jasa
    $countBarang = 0;
    $countJasa = 0;
    // Tambahkan data nota, barang, jasa, dan total harga ke array
    // Loop melalui setiap nota
    foreach ($notas as $nota) {
      // Buat array untuk menyimpan data nota dan total harga
      $notaData = [
        'Nama Pelanggan' => $nota->pelanggan,
        'Status' => $nota->status,
        'Tanggal' => $nota->created_at,
        'Total Harga' => 0, // Inisialisasi total harga dengan 0
      ];


      foreach ($nota->barang as $barangs) {
        // Hitung total harga berdasarkan harga barang dan harga jasa dikalikan jumlah
        $totalHargaBarang = $barangs->harga_barang * $barangs->pivot->jumlah;

        // Jika harga barang lebih dari 1, tambahkan ke jumlah barang
        if ($totalHargaBarang > 1) {
          $countBarang += 1;
        }
      }

      foreach ($nota->servis->jasa as $jasas) {
        // Hitung total harga jasa
        $totalHargaJasa = $jasas->harga_jasa_servis;

        // Jika harga jasa lebih dari 1, tambahkan ke jumlah jasa
        if ($totalHargaJasa > 1) {
          $countJasa += 1;
        }
      }

      // Hanya tambahkan data jika jumlah barang dan jenis jasa lebih dari 1
      if ($countBarang > 1 && $countJasa > 1) {
        // Hitung ulang total harga berdasarkan harga barang dan harga jasa dikalikan jumlah
        $totalHargaBarang = 0;
        $totalHargaJasa = 0;

        foreach ($nota->barang as $barangs) {
          $totalHargaBarang += $barangs->harga_barang * $barangs->pivot->jumlah;
        }

        foreach ($nota->servis->jasa as $jasas) {
          $totalHargaJasa += $jasas->harga_jasa_servis;
        }

        $totalHarga = $totalHargaBarang + $totalHargaJasa;

        // Tambahkan total harga ke total harga nota
        $notaData['Total Harga'] += $totalHarga;
      } else {
        $totalHargaBarang = $barangs->harga_barang * $barangs->pivot->jumlah;
        $totalHargaJasa = $jasas->harga_jasa_servis;

        // Hanya tambahkan data jika harga barang dan harga jasa lebih dari 1
        $totalHarga = $totalHargaBarang + $totalHargaJasa;

        // Tambahkan total harga ke total harga nota
        $notaData['Total Harga'] += $totalHarga;
      }
      $data[] = $notaData;
    }

    // Export data ke Excel
    // return Excel::download(function ($excel) use ($data) {
    //     $excel->sheet('Sheet 1', function ($sheet) use ($data) {
    //         $sheet->fromArray($data, null, 'A1', false, false);
    //     });
    // }, 'Data Nota.xlsx');


    // return Excel::download(new ExportNota($data), 'validate-data.xlsx');
    // Export data ke Excel
    return Excel::download(new ExportNota_Bulan($data, $startDate, $endDate), 'DataNota_' . $filename . '.xlsx');
  }
}
