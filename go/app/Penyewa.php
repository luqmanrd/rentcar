<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'USERNAME','PASSWORD','NAMA', 'ALAMAT', 'NO_TELP'
    ];

    protected $table = 'penyewa';

    public $timestamps = false;

}