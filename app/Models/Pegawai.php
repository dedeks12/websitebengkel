<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = ['nama_pegawai', 'gaji', 'alamat','no_ktp'];

    public function nota()
    {
        return $this->hasMany('App\Models\Nota');
    }

    protected $table = 'pegawai';
}
