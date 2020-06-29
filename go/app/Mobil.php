<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'PLATNOMOR', 'JENIS', 'MERK', 'TAHUN', 'WARNA', 'HARGA',
    ];

    protected $table = 'mobil';

    public $timestamps = false;
}