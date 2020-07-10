<?php

namespace App\Imports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            //
            'nis' => $row[1], 
            'no_rekening' => $row[2],
            'nama' => $row[3],
            'kelas' => $row[4],
            'jurusan' => $row[5], 
            'tahun_angkatan' => $row[6], 
            'jenis_kelamin' => $row[7],
            'alamat' => $row[8], 
            'no_telepon' => $row[9],
            'angka' => $row[10], 
            'nilai_siswa' => $row[11],
            
        ]);
    }
}
