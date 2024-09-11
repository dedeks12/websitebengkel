<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    use HasFactory;
    protected $fillable = ['status','pelanggan', 'tanggal', 'plat','telepon'];

    public function jasa()
    {
        return $this->belongsToMany('App\Models\Jasa');
    }
    public function nota()
    {
        return $this->hasOne(Nota::class, 'servis_id')->onDelete('cascade');
    }
    protected $table = 'servis';
    protected $primarykey = 'id';
}

