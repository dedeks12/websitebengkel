<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;
    protected $fillable = ['nama_jasa_servis', 'harga_jasa_servis'];

    public function servis()
    {
        return $this->hasMany('App\Models\Servis');
    }
//     public function servis()
// {
//     return $this->belongsToMany(Servis::class, 'jasa_servis');
// }

    protected $table = 'jasa';
}
