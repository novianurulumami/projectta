<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = ['id_siswa', 'nominal', 'nama_petugas', 'status_transaksi'];

}
