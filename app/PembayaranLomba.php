<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PembayaranLomba extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'NamaPengirim', 'NamaBank', 'BuktiTransfer', 'WaktuSubmitTransfer',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
