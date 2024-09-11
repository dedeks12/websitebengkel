<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nota extends Model
{
  use HasFactory;

  protected $fillable = ['pelanggan', 'telepon', 'status', 'servis_id'];
  public function servis()
  {
    return $this->belongsTo(Servis::class, 'servis_id');
  }

  public function barang()
  {
    return $this->belongsToMany(Barang::class, 'barang_nota')
      ->withPivot('jumlah');
  }

  // public function barang()
  // {
  //   return $this->belongsToMany(Barang::class, 'barang_nota')
  //     ->withPivot('jumlah', 'harga');
  // }

  public function pegawai()
  {
    return $this->belongsToMany('App\Models\Pegawai');
  }
  protected $table = 'nota';
  protected $primarykey = 'id';
}
