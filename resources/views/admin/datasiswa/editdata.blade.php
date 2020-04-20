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
        <div class="dropdown">
            <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-info active" data-target="#" href="/page.html">
                Jurusan <span class="caret"></span>
            </a>
    		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
            <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Akuntansi</a>
                <ul class="dropdown-menu">
                  <li class="dropdown-submenu">
                    <a href="#">X AK</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    	<li><a href="#">4</a></li>
                    </ul>
                    <a href="#">XI AK</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    	<li><a href="#">4</a></li>
                    </ul>
                    <a href="#">XII AK</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    	<li><a href="#">4</a></li>
                    </ul>
                  </li>
                </ul>
              </li>

              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Multimedia</a>
                <ul class="dropdown-menu">
                  <li class="dropdown-submenu">
                    <a href="#">X MM</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                    	<li><a href="#">2</a></li>
                    </ul>
                    <a href="#">XI MM</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                    	<li><a href="#">2</a></li>
                    </ul>
                    <a href="#">XII MM</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                    	<li><a href="#">2</a></li>
                    </ul>
                  </li>
                </ul>
              </li>

              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Pemasaran</a>
                <ul class="dropdown-menu">
                  <li class="dropdown-submenu">
                    <a href="#">X PM</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                    </ul>
                    <a href="#">XI PM</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                    </ul>
                    <a href="#">XII PM</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                    </ul>
                  </li>
                </ul>
              </li>

              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Perkantoran</a>
                <ul class="dropdown-menu">
                  <li class="dropdown-submenu">
                    <a href="#">X AP</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    	<li><a href="#">4</a></li>
                    </ul>
                    <a href="#">XI AP</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    	<li><a href="#">4</a></li>
                    </ul>
                    <a href="#">XII AP</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    	<li><a href="#">4</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
        </div>
        <br></br>
        <div class="col-4">
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Select All</label>

        <a href="#" class="btn btn-info active right" role="button" aria-pressed="true">Edit Kelas</a>
      </div>
      </div>
      <div class="box-body">
          <table class="table table-stripped table-bordered">
            <thread>
              <tr>
                <th> </th>
                <th>NO</th>
                <th>KELAS</th>
                <th>NIS</th>
                <th>NAMA SISWA</th>
              </tr>
            </thread>
            <tbody>
            </tbody>
          </table>
        </div>
        <a href="#" class="btn btn-info active right" role="button" aria-pressed="true">Keluar</a>
      </div>

     </section>
</html>
@stop