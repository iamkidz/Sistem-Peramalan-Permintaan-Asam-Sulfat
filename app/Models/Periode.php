<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $table = 'periode';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function peramalan()
    {
        return $this->hasMany(Peramalan::class, 'id_peramalan');
    }

    public function permintaan()
    {
        return $this->hasMany(Permintaan::class, 'id_permintaan');
    }
}
