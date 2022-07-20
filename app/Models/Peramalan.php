<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peramalan extends Model
{
    use HasFactory;

    protected $table = 'peramalan';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode');
    }

    public function permintaan()
    {
        return $this->belongsTo(Permintaan::class, 'id_permintaan');
    }
}
