<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamFinal extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'IsWaiting', 'IsConfirmed', 'FileCV', 'FileName'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
