<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['nama_barang', 'harga_barang', 'stok', 'slug'];

    // public function nota()
    // {
    //     return $this->hasMany('App\Models\Nota')->withPivot('jumlah');;
    // }
    public function nota()
    {
    return $this->belongsToMany(Nota::class, 'barang_nota')
    ->withPivot('jumlah');
    }
    protected $table = 'barang';
}
