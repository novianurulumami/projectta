<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasMeta extends Model
{
    protected $table = 'kelas_meta';
    protected $fillable = ['id_kelas_meta', 'nama_angka'];
}
