@extends('layouts.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">

<div class="container-fruid">
    <div class="row">
        <h3>Data Siswa</h3>
        <div class="col-4">
            <a href="{{route('tambah')}}" class="btn btn-info active" role="button" aria-pressed="true"><i class="fa fa-plus"></i>   Tambah Data Siswa</a>
            <a href="{{route('tambahkelas')}}" class="btn btn-info active" role="button" aria-pressed="true"><i class="fa fa-plus"></i>   Tambah Data Kelas</a>
            <a href="{{route('datakelas.index')}}" class="btn btn-info active" role="button" aria-pressed="true"> <i class="fa fa-edit"></i>   Edit Data Kelas</a>
            <a href="{{route('import.index')}}" class="btn btn-info active" role="button" aria-pressed="true"> <i class="fa fa-file-excel-o"></i>  Import Data Siswa</a>
            <a href="{{route('export.index')}}" class="btn btn-info active" role="button" aria-pressed="true"> <i class="fa fa-file-excel-o"></i>  Export Data Siswa</a>
        <br/><br/>
<?php 
use Illuminate\Support\Facades\DB;
?>
<form action="{{url('datasiswa')}}" method="GET">
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
        </div>
        <section class="content">
        <div class="box">  
        <div class="box-header">
        <br/><br/>

        <div class="box-body">
          <table class="table table-stripped table-bordered">
            <thead>
              <tr>
                <th>NAMA SISWA</th>
                <th>KELAS</th>
                <th>JURUSAN</th>
                <th>ANGKA</th>
                <th>NO REKENING</th>
                <th>JUMLAH SALDO</th>
                <th>AKSI</th>
              </tr>
            </thead>
            @foreach($data_siswa as $datasiswa)
              <tr>
              <td>{{$datasiswa->nama}}</td>
              <td>{{$datasiswa->nama_kelas}}</td>
              <td>{{$datasiswa->nama_jurusan}}</td>
              <td>{{$datasiswa->nama_angka}}</td>
              <td>{{$datasiswa->no_rekening}}</td>
              <td>
                <?php $id = $datasiswa->id ;
                ?>
                {{ 
                DB::table('transaksi')->where('status_transaksi','Saldo Awal')->where('id_siswa',$datasiswa->id)->sum('nominal')+
                DB::table('transaksi')->where('status_transaksi','Setoran')->where('id_siswa',$datasiswa->id)->sum('nominal')-
                DB::table('transaksi')->where('status_transaksi','Penarikan')->where('id_siswa',$datasiswa->id)->sum('nominal') }}
              </td>
              <td> <a href="{{route('detailsaldosiswa', $datasiswa->id, 'detailsaldo')}}"><i class="fa fa-info-circle"></i></a>  | 
              <a href="{{route('hapusdata', $datasiswa->id, 'delete')}}"> <i class="fa fa-trash" onclick="return confirm('Hapus permanen data ini?')"></i> </a></td>
              </tr>
            @endforeach
            <tbody>
            </tbody>
          </table>
      {{ $data_siswa->links() }}
        </div>
      </div>
    </section>
    </div>
</div>
</html>
@stop