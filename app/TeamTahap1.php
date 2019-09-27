<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamTahap1 extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'FileSubmit', 'WaktuSubmit', 'Skor'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
