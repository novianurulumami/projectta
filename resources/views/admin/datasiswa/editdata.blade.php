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
         <h3>Edit Data Kelas</h3>
        </div>
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
        <br></br>
        <a href="#" class="btn btn-info active right" role="button" data-toggle="modal" data-target="#exampleModal" onclick="refresh()">Edit Kelas</a>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EDIT DATA KELAS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form method="post" action="http://localhost/trystore/index.php/menu/pengguna/simpan" enctype="multipart/form-data" class="formpengguna">
            <div class="form-group">

            
            <div class="form-group">
              <label >PILIH KELAS</label>
              <select class="form-control required" name="groupuser" id="groupuser" required>
                                         <option value="113">X</option>
                                          <option value="114">XI</option>
                                          <option value="115">XII</option>
              </select>
            </div>

            <div class="form-group">
              <label >PILIH JURUSAN</label>
              <select class="form-control required" name="groupuser" id="groupuser" required>
                                         <option value="113">AKUNTANSI</option>
                                          <option value="114">MULTIMEDIA</option>
                                          <option value="115">PEMASARAN</option>
                                          <option value="116">PERKANTORAN</option>
              </select>
            </div>

            <div class="form-group">
              <label >PILIH ANGKA</label>
              <select class="form-control required" name="groupuser" id="groupuser" required>
                                         <option value="113">1</option>
                                          <option value="114">2</option>
                                          <option value="115">3</option>
                                          <option value="116">4</option>
                                          <option value="115">5</option>
                                          <option value="116">6</option>
              </select>
            </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary buttonsave" value="save"><i class="fa fa-save"></i> Simpan</button>
          </div>
          </form>
          </div>
        </div>
        </div>
        </div>
        <div class="col-4">
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Select All</label>

         </div>
      </div>
      <div class="box-body">
          <table class="table table-hover table-stripped table-bordered">
            <thread>
              <tr>
                <th>KELAS</th>
                <th>JURUSAN</th>
                <th>ANGKA</th>
                <th>NIS</th>
                <th>NAMA SISWA</th>
              </tr>
            </thread>
            @foreach($data_siswa as $datasiswa)
              <tr>
              <td>{{$datasiswa->nama_kelas}}</td>
              <td>{{$datasiswa->nama_jurusan}}</td>
              <td>{{$datasiswa->nama_angka}}</td>
              <td>{{$datasiswa->nis}}</td>
              <td>{{$datasiswa->nama}}</td>
              </tr>
            @endforeach
            <tbody>
            </tbody>
          </table>
          {{ $data_siswa->links() }}
        </div>
        
        <a href="#" class="btn btn-info active right" role="button" aria-pressed="true">Keluar</a>
      </div>
      
     </section>
</html>
@stop