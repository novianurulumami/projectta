@extends('layouts.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{asset('css/dropdown.css')}}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style media="screen">
        .left{
            float: left;
            display: block;
        }
        .right{
            float: right;
            display: block;
        }
    </style>
</head>
<section class="content">

      <div class="box">  
        <div class="box-header">

         <!-- Button trigger modal -->
         <h3>Keterampilan</h3>
        </div>
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
        <br></br>
        <div class="box-body">
          <table class="table table-stripped table-bordered">
            <thread>
              <tr>
                <th>NIS</th>
                <th>NO REKENING</th>
                <th>KELAS</th>
                <th>JURUSAN</th>
                <th>ANGKA</th>
                <th>NAMA SISWA</th>
                <th>NILAI KETERAMPILAN</th>
                <th>AKSI</th>
            </thread>
            @foreach($data_siswa as $datasiswa)
              <tr>
              <td>{{$datasiswa->nis}}</td>
              <td>{{$datasiswa->no_rekening}}</td>
              <td>{{$datasiswa->nama_kelas}}</td>
              <td>{{$datasiswa->nama_jurusan}}</td>
              <td>{{$datasiswa->nama_angka}}</td>
              <td>{{$datasiswa->nama}}</td>
              <td></td>
              <td> <a href="{{route('editnilai', $datasiswa->id, 'edit')}}"><i class="fa fa-edit"></i></a>   |
              <a href="{{route('hapusnilai', $datasiswa->id, 'delete')}}"> <i class="fa fa-trash"></i> </a></td>
              </tr>
            @endforeach
            <tbody>
            </tbody>
          </table>
          {{ $data_siswa->links() }}
        <button type='button' class='btn btn-primary center-block'>Cetak</button>
        </div>
      </div>
     </section>
</html>
@stop