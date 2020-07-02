<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswa1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa1', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nis');
            $table->string('no_rekening');
            $table->string('nama');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('tahun_angkatan');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('no_telepon');
            $table->string('angka');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa1');
    }
}
