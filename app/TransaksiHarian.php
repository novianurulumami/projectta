<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiHarian extends Model
{
    //
    protected $table = 'transaksi_harian';
    protected $fillable = ['id_transaksiharian', 'saldo_harian'];
}
