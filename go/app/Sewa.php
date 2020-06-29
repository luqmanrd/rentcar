<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ID_PENYEWA', 'ID_MOBIL', 'TGL_PINJAM', 'TGL_KEMBALI', 'BIAYA_SEWA'
    ];

    protected $table = 'sewa';

    public $timestamps = false;

}