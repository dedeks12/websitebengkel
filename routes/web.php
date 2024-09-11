<?php

use App\Http\Controllers\NotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/', [ServisController::class, 'cari_servis'])->name('servis');


Route::resource('/upload', \App\Http\Controllers\UploadController::class);
Route::get('/export-pdf-transfer', [UploadController::class, 'pdfbuktitransfer'])->name('transfer.export-pdf');
Route::get('/export-excel-transfer', [UploadController::class, 'Excelbuktitransfer'])->name('transfer.export-excel');
Route::put('/konfirmasi/{id}', [UploadController::class, 'ubahstatus'])->name('upload.status');

Route::get('/exporttopdf', [BarangController::class, 'exportPDF'])->name('export.pdf');
Route::get('/exporttopdftgl', [BarangController::class, 'exportPDFtgl'])->name('export.pdftgl');
//Route::resource('/user/upload', \App\Http\Controllers\UploadController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('persentaseKeaktifan');

Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);
Route::resource('/barang', \App\Http\Controllers\BarangController::class);
Route::resource('/jasa', \App\Http\Controllers\JasaController::class);
Route:: resource('servis', ServisController::class);
Route::get('/formwa/{id}', [ServisController::class, 'kirimservis'])->name('servis.formwa');
Route::put('/ubahstatus/{id}', [ServisController::class, 'ubahstatus'])->name('servis.status');

Route::put('/beranda-yoo/{id}', [NotaController::class, 'ubahstatus'])->name('bisaeditt');
Route::get('/pembayaran/{id}', [NotaController::class, 'offline'])->name('nota.pembayaran');
Route::get('/export-pdf-nota', [NotaController::class, 'pdfnota'])->name('nota.export-pdf');
Route::get('/export-excel-nota', [NotaController::class, 'Excelnota'])->name('nota.export-excel');
Route::get('/export-nota-per-tgl', [NotaController::class, 'exportPDFtgl'])->name('export.pdftgl');
Route::get('/excel-nota-per-tgl', [NotaController::class, 'exportExceltgl'])->name('export.exceltgl');

Route::get('/status/{id}', [AuthController::class, 'nota_id'])->name('nota.id');


Route::resource('/pegawai', \App\Http\Controllers\PegawaiController::class);
Route::put('/pegawai/{id}/edit', [PegawaiController::class, 'update']);
Route::get('/export-pdf-pegawai', [PegawaiController::class, 'pdfpegawai'])->name('pegawai.export-pdf');
Route::get('/export-excel-pegawai', [PegawaiController::class, 'Excelpegawai'])->name('pegawai.export-excel');


Route::resource('/nota', \App\Http\Controllers\NotaController::class);
Route::get('/export-excel', [BarangController::class, 'ExcelBarang'])->name('barang.export-excel');
Route::get('/export-pdf', [BarangController::class, 'pdfbarang'])->name('barang.export-pdf');
Route::get('/print-nota-pdf/{id}', [NotaController::class, 'pdf'])->name('nota.print.pdf');
Route::put('/beranda-yo/{id}', [NotaController::class, 'ubahstatus'])->name('bisaedit');
Route::get('/wa-nota/{id}', [NotaController::class, 'kirimnota'])->name('nota.wa');
Route::get('/tampilanpdf/{id}', [NotaController::class, 'previewnota'])->name('nota.pdf');

/* Auth Login */
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('nota', [AuthController::class, 'nota']); 
Route::get('barang', [AuthController::class, 'barang']);
Route::get('pegawai', [AuthController::class, 'pegawai']);
Route::get('jasa', [AuthController::class, 'jasa']);
Route::get('upload', [AuthController::class, 'upload']);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');

Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom'); 

Route::get('signout', [AuthController::class, 'signOut'])->name('signout');