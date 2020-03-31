@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <h3>Data Siswa</h3>
        <div class="col-4">
            <a href="#" class="btn btn-info active" role="button" aria-pressed="true">Tambah Data</a>
            <a href="#" class="btn btn-info active" role="button" aria-pressed="true">Edit Data Kelas</a>
            <a href="#" class="btn btn-info active" role="button" aria-pressed="true">Import Data</a>
            <a href="#" class="btn btn-info active" role="button" aria-pressed="true">Export Data</a>
            <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown button
            </button>
                <ul class="dropdown-menu dropdown-user">
                <li><a href="#">Akuntansi</a>
                </li>
                <li><a href="#">Multimedia</a>
                </li>
                <li><a href="#">Pemasaran</a>
                </li>
                <li><a href="#">Perkantoran</a>
                </li>
                </ul>
            </div>
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
    </div>
</div>
@stop