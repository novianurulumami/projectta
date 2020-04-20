@extends('layouts.admin')
@section('content')
<section class="content">

      <div class="box">  
        <div class="box-header">

         <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="refresh()"> <i class="fa fa-plus"></i>   Tambah Data </button>
        <br></br>
        </div>
        <div class="box-body">
          <table class="table table-stripped table-bordered">
            <thread>
              <tr>
                <th>NO ID</th>
                <th>NIS</th>
                <th>NAMA SISWA</th>
                <th>KELAS</th>
                <th>THN ANGKATAN</th>
                <th>JENIS KELAMIN</th>
                <th>ALAMAT</th>
                <th>NO. TELP</th>
              </tr>
            </thread>
            <tbody>
            </tbody>
          </table>
        </div>
        <button type='button' class='btn btn-primary center-block'> Simpan </button>
      </div>

     </section>
@stop