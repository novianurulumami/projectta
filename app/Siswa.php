<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa1';

    protected $fillable = ['nis', 'no_rekening', 'nama', 'kelas', 'jurusan', 'tahun_angkatan', 'angka', 'jenis_kelamin', 'alamat', 'no_telepon', 'nilai_siswa'];
}
