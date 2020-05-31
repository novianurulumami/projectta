<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa1';
    protected $fillable = ['nis', 'nama', 'kelas', 'jurusan', 'tahun_angkatan','angka', 'jenis_kelamin', 'alamat', 'no_telepon'];
}
