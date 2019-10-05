<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamTahap2 extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'FileSubmit', 'WaktuSubmit', 'Skor', 'FileName'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
