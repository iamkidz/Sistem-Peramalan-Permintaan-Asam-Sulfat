<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;

    protected $table = 'permintaan';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode');
    }

    public function peramalan()
    {
        return $this->hasOne(Peramalan::class, 'id_permintaan');
    }
}
