<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPeserta extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'NamaLengkap', 'JenisKelamin', 'Jurusan', 'NoHP', 'IDLine', 'KartuTandaMahasiswa', 'NIM'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
