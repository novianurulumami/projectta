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
            <a href="{{route('tambah')}}" class="btn btn-info active" role="button" aria-pressed="true"><i class="fa fa-plus"></i>   Tambah Data</a>
            <a href="{{route('datakelas.index')}}" class="btn btn-info active" role="button" aria-pressed="true"> <i class="fa fa-edit"></i>   Edit Data Kelas</a>
            <a href="{{route('import.index')}}" class="btn btn-info active" role="button" aria-pressed="true">Import Data</a>
            <a href="{{route('export.index')}}" class="btn btn-info active" role="button" aria-pressed="true">Export Data</a>
        <br/><br/>
    <ul class="nav nav-tabs">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kelas
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">X</a></li>
          <li><a href="#">XI</a></li>
          <li><a href="#">XII</a></li> 
        </ul>
      </li>
      <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Jurusan
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Akuntansi</a></li>
          <li><a href="#">Multimedia</a></li>
          <li><a href="#">Pemasaran</a></li> 
          <li><a href="#">Perkantoran</a></li> 
        </ul>
      </li>
      <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Angka
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li> 
          <li><a href="#">4</a></li> 
          <li><a href="#">5</a></li> 
        </ul>
      </li>
    </ul>

            <br/><br/>
            <div class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </input>
                        </div>
            </div>
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
                <th>NO REKENING</th>
                <th>JUMLAH SALDO</th>
                <th>AKSI</th>
              </tr>
            </thread>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
        <nav aria-label="...">
        <ul class="pagination">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </section>
    </div>
</div>

</html>
@stop