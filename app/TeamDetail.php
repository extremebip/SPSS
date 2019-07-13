<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamDetail extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'NamaPeserta1', 'JurusanPeserta1', 'NoHPPeserta1', 'IDLinePeserta1', 'KartuTandaMahasiswa1',
        'NamaPeserta2', 'JurusanPeserta2', 'NoHPPeserta2', 'IDLinePeserta2', 'KartuTandaMahasiswa2',
    ];
}
