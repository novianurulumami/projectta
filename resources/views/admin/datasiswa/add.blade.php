@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-6">
</div>
<div class="col-6">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i>   Tambah Data </button>
<br></br>
</div>
<div class="box-body">
<table class="table table-hover table-stripped table-bordered" >
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
            @foreach($data_siswa as $datasiswa)
              <tr>
              <td>{{$datasiswa->id}}</td>
              <td>{{$datasiswa->nis}}</td>
              <td>{{$datasiswa->nama}}</td>
              <td>{{$datasiswa->kelas}}</td>
              <td>{{$datasiswa->tahun_angkatan}}</td>
              <td>{{$datasiswa->jenis_kelamin}}</td>
              <td>{{$datasiswa->alamat}}</td>
              <td>{{$datasiswa->no_telepon}}</td>
              </tr>
            @endforeach
          </table>
          </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{route('tambahdata')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="exampleInputEmail1">NIS</label>
          <input type="text" class="form-control" name="nis" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIS">
        </div>
        
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Lengkap</label>
          <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Tahun Angkatan</label>
          <input name="tahun_angkatan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tahun Angkatan">
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">Pilih Kelas</label>
          <select name="kelas" class="form-control" id="exampleFormControlSelect1">
            <option>X</option>
            <option>XI</option>
            <option>XII</option>
          </select>
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlSelect1">Pilih Jurusan</label>
          <select name="jurusan" class="form-control" id="exampleFormControlSelect1">
            <option>AKUNTANSI</option>
            <option>MULTIMEDIA</option>
            <option>PEMASARAN</option>
            <option>PERKANTORAN</option>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">Pilih Angka</label>
          <select name="angka" class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
          <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
            <option>Laki-Laki</option>
            <option>Perempuan</option>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Alamat</label>
          <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">No Telepon</label>
          <input name="no_telepon" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No Telepon">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection