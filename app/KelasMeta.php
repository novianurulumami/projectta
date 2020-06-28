<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasMeta extends Model
{
    protected $table = 'kelasmeta';
    protected $fillable = ['id_kelasmeta', 'nama_angka'];
}
