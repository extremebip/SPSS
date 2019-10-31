<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'NamaLengkap', 'email', 'password', 'AsalUniversitas', 'admin_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pembayaranLomba()
    {
        return $this->hasOne('App\PembayaranLomba');
    }

    public function detailPesertas()
    {
        return $this->hasMany('App\DetailPeserta');
    }

    public function teamTahap1()
    {
        return $this->hasOne('App\TeamTahap1');
    }

    public function teamTahap2()
    {
        return $this->hasOne('App\TeamTahap2');
    }

    public function teamFinal()
    {
        return $this->hasOne('App\TeamFinal');
    }
}
