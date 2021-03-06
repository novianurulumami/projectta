@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
<div class="col-6">
</div>
<div class="col-6">
<!-- Button trigger modal -->
<br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i>   Tambah Data </button>
<br></br>
    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
        {{session('sukses')}}
        </div>
    @endif
</div>
<form action="{{route('tambahdatasiswa.index')}}" method="GET">
  <ul class="nav nav-tabs">
    <li class="dropdown">
      <select name="id_kelas" class="form-control" id="">
        <option value="" selected>Semua</option>
        @foreach ($kelas as $key => $item)
        <option value="{{$item->id_kelas}}" {{($item->id_kelas == $input->id_kelas) ? "selected" : ""}}>
          {{$item->nama_kelas}}</option>
        @endforeach
      </select>
    </li>
    <li class="dropdown">
      <select name="id_jurusan" class="form-control" id="">
        <option value="" selected>Semua</option>
        @foreach ($jurusan as $key => $item )
              <option value="{{$item->id_jurusan}}" {{$item->id_jurusan == $input->id_jurusan ? "selected" : ""}}>{{$item->nama_jurusan}}</option>
        @endforeach
      </select>
    </li>
    <li class="dropdown">
      <select name="id_kelas_meta" class="form-control" id="">
        <option value="" selected>Semua</option>
        @foreach ($kelasmeta as $key => $item)
        <option value="{{$item->id_kelas_meta}}" {{$item->id_kelas_meta == $input->id_kelas_meta  ? "selected" : ""}}>{{$item->nama_angka}}</option>
         @endforeach
      </select>
    </li>
    <div class="input-group custom-search-form">
      <input type="text" name="cari" class="form-control" placeholder="Search..." value="{{ empty($input->cari) ? '' : $input->cari}}">
        <span class="input-group-btn">
            <button class="btn btn-primary"  type="submit" value="CARI">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>
  </ul>
</form>
<br></br>
<div class="box-body">
<table class="table table-hover table-stripped table-bordered" >
            <thead>
              <tr>
                <th>NIS</th>
                <th>NO REKENING</th>
                <th>NAMA SISWA</th>
                <th>KELAS</th>
                <th>JURUSAN</th>
                <th>ANGKA</th>
                <th>THN ANGKATAN</th>
                <th>JENIS KELAMIN</th>
                <th>AKSI</th>
              </tr>
            </thead>
            @foreach($data_siswa as $datasiswa)
              <tr>
              <td>{{$datasiswa->nis}}</td>
              <td>{{$datasiswa->no_rekening}}</td>
              <td>{{$datasiswa->nama}}</td>
              <td>{{$datasiswa->nama_kelas}}</td>
              <td>{{$datasiswa->nama_jurusan}}</td>
              <td>{{$datasiswa->nama_angka}}</td>
              <td>{{$datasiswa->tahun}}</td>
              <td>{{$datasiswa->jenis_kelamin}}</td>
              <td> <a href="{{route('detaildatasiswa', $datasiswa->id, 'detail')}}"><i class="fa fa-info-circle"></i></a>  | 
              <a href="{{route('editdata', $datasiswa->id, 'edit')}}"><i class="fa fa-edit"></i></a>   |
              <a href="{{route('hapusdata', $datasiswa->id, 'delete')}}"> <i class="fa fa-trash" onclick="return confirm('Hapus permanen data ini?')"></i> </a></td>
              </tr>
            @endforeach
          </table>
          {{ $data_siswa->links() }}
          </div>
    </div>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
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
          <input type="text" class="form-control" name="nis" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIS" required>
        </div>
        
        <div class="form-group">
          <label for="exampleInputEmail1">NO REKENING</label>
          <input type="text" class="form-control" name="no_rekening" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NO REKENING" required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Nama Lengkap</label>
          <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Tahun Angkatan</label>
          <select name="tahun_angkatan" class="form-control" id="exampleFormControlSelect1" required>
            <option value="" selected disabled>- Pilih Tahun -</option>
            @foreach ($data_tahun as $item)
              <option value="{{$item->id_tahun_angkatan}}"> {{$item->tahun}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">Pilih Kelas</label>
          <select name="kelas" class="form-control" id="exampleFormControlSelect1" required>
            <option value="" selected disabled>- Pilih Kelas -</option>
            @foreach ($kelas as $item)
              <option value="{{$item->id_kelas}}"> {{$item->nama_kelas}}</option>
            @endforeach
          </select>
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlSelect1">Pilih Jurusan</label>
          <select name="jurusan" class="form-control" id="exampleFormControlSelect1" required>
            <option value="" selected disabled>- Pilih Jurusan -</option>
            @foreach ($jurusan as $item)
              <option value="{{$item->id_jurusan}}"> {{$item->nama_jurusan}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">Pilih Angka</label>
          <select name="angka" class="form-control" id="exampleFormControlSelect1" required>
            <option value="" selected disabled>- Pilih Angka -</option>
            @foreach ($kelasmeta as $item)
              <option value="{{$item->id_kelas_meta}}"> {{$item->nama_angka}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
          <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1" required>
            <option value="" selected disabled>- Pilih Jenis Kelamin -</option>
            <option>Laki-Laki</option>
            <option>Perempuan</option>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Alamat</label>
          <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat" required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">No Telepon</label>
          <input name="no_telepon" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No Telepon" required>
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