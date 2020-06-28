@extends('layouts.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{asset('css/dropdown.css')}}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<div class="container-fruid">
    <div class="row">
        <h3>Data Siswa</h3>
        <div class="col-4">
            <a href="{{route('tambah')}}" class="btn btn-info active" role="button" aria-pressed="true"><i class="fa fa-plus"></i>   Tambah Data Siswa</a>
            <a href="{{route('tambahkelas')}}" class="btn btn-info active" role="button" aria-pressed="true"><i class="fa fa-plus"></i>   Tambah Data Kelas</a>
            <a href="{{route('datakelas.index')}}" class="btn btn-info active" role="button" aria-pressed="true"> <i class="fa fa-edit"></i>   Edit Data Kelas</a>
            <a href="{{route('import.index')}}" class="btn btn-info active" role="button" aria-pressed="true">Import Data</a>
            <a href="{{route('export.index')}}" class="btn btn-info active" role="button" aria-pressed="true">Export Data</a>
        <br/><br/>
    <ul class="nav nav-tabs">
      <li class="dropdown">
        <select name="angka" class="form-control" id="exampleFormControlSelect1">
          <option><a href="#">X</a></option>
          <option><a href="#">XI</a></option>
          <option><a href="#">XII</a></option>
        </select>
      </li>
      <li class="dropdown">
        <select name="angka" class="form-control" id="exampleFormControlSelect1">
          <option>Akuntansi</option>
          <option>Multimedia</option>
          <option>Pemasaran</option>
          <option>Perkantoran</option>
        </select>
      </li>
      <li class="dropdown">
        <select name="angka" class="form-control" id="exampleFormControlSelect1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
        </select>
      </li>
      <button class="btn btn-default" type="button">
        <i class="fa fa-search"></i>
    </ul>

            <br/><br/>
            <form action="{{url('datasiswa')}}" method="GET">
            <div class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" name="cari" class="form-control" placeholder="Search..." value="{{ old('cari') }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default"  type="submit" value="CARI">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </input>
                        </div>
            </div>
          </form>
            
        </div>
        <section class="content">
        <div class="box">  
        <div class="box-header">
        <br/><br/>

        <div class="box-body">
          <table class="table table-stripped table-bordered">
            <thread>
              <tr>
                <th>NAMA SISWA</th>
                <th>KELAS</th>
                <th>JURUSAN</th>
                <th>ANGKA</th>
                <th>NO REKENING</th>
                <th>JUMLAH SALDO</th>
                <th>AKSI</th>
              </tr>
            </thread>
            @foreach($data_siswa as $datasiswa)
              <tr>
              <td>{{$datasiswa->nama}}</td>
              <td>{{$datasiswa->nama_kelas}}</td>
              <td>{{$datasiswa->nama_jurusan}}</td>
              <td>{{$datasiswa->nama_angka}}</td>
              <td>{{$datasiswa->no_rekening}}</td>
              <td></td>
              <td> <a href="{{route('detaildatasiswa', $datasiswa->id, 'detail')}}"><i class="fa fa-info-circle"></i></a>  | 
              <a href="{{route('editdata', $datasiswa->id, 'edit')}}"><i class="fa fa-edit"></i></a>   |
              <a href="{{route('hapusdata', $datasiswa->id, 'delete')}}"> <i class="fa fa-trash"></i> </a></td>
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