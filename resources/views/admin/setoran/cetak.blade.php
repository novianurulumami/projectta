@extends('layouts.admin')
@section('content')
<h3>Transaksi</h3>
<form action="" method="GET">
    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Tanggal Penarikan</h4></label>
       <!--  <input type="hidden" name="id" id="id"> -->
        <div class="col-md-2">
        <input type="text" value="<?php echo date("Y-m-d")?>" class="form-control" name="tgl_jual" aria-describedby="emailHelp" placeholder="TANGGAL JUAL" id="tgl_jual" disabled>
        </div>
    </div> 
    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>NIS</h4></label>
        <div class="col-md-4">
            {{-- <input type="text"  id="nis" name="nis"@if (!empty($datasiswa)) value={{$datasiswa->nis}} @endif class="form-control">  --}}
        </div>
        <div class="col-md-2">
            
            <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
        </div>
    </div>
    </form>
    
    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>No Rekening</h4></label>
        <div class="col-md-4">
            {{-- <input type="text" name="nama" disabled class="form-control" @if (!empty($datasiswa)) value="{{$datasiswa->no_rekening}}" @endif>
            <input type="hidden" @if (!empty($datasiswa)) value="{{$datasiswa->no_rekening}}" @endif  name="nama" class="form-control"> --}}
        </div>
    </div>
    
    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Nama</h4></label>
        <div class="col-md-4">
        {{-- <input type="text" name="nama" disabled class="form-control" @if (!empty($datasiswa)) value="{{$datasiswa->nama}}" @endif>
        <input type="hidden" @if (!empty($datasiswa)) value="{{$datasiswa->nama}}" @endif  name="nama" class="form-control"> --}}
        </div>
    </div>
    
    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Kelas</h4></label>
        <div class="col-md-4">
            {{-- <input type="text" name="kelas" disabled class="form-control" @if (!empty($datasiswa)) value="{{$datasiswa->nama_kelas}}" @endif>
            <input type="hidden" @if (!empty($datasiswa)) value="{{$datasiswa->nama_kelas}}" @endif  name="kelas" class="form-control"> --}}
        </div>
    </div>
    
    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Jurusan</h4></label>
        <div class="col-md-4">
            {{-- <input type="text" name="jurusan" disabled class="form-control" @if (!empty($datasiswa)) value="{{$datasiswa->nama_jurusan}}" @endif>
            <input type="hidden" @if (!empty($datasiswa)) value="{{$datasiswa->nama_jurusan}}" @endif  name="jurusan" class="form-control"> --}}
        </div>
    </div>
    
    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Angka</h4></label>
        <div class="col-md-4">
            {{-- <input type="text" name="angka" disabled class="form-control" @if (!empty($datasiswa)) value="{{$datasiswa->angka}}" @endif>
            <input type="hidden" @if (!empty($datasiswa)) value="{{$datasiswa->angka}}" @endif  name="angka" class="form-control"> --}}
        </div>
    </div>
    
    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Jenis Transaksi</h4></label>
        <div class="col-md-4">
            <select type="text" id="" class="form-control">
                <option value="111">Setoran</option>
                <option value="211">Penarikan</option>
            </select>
        </div>
    </div>
    
    <div class="form-group row">
    <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Jurnal</h4></label>
    <div class="col-md-2">
        <select type="text" id="" class="form-control">
            <option value="111">Kas</option>
            <option value="211">Hutang</option>
        </select>
    </div>
    </div>
    
    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Saldo</h4></label>
        <div class="col-md-4"> 
            <input type="text" id="" class="form-control">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Nominal</h4></label>
        <div class="col-md-4">
            <input type="text" id="" class="form-control">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Petugas</h4></label>
        <div class="col-md-4">
            <input type="text" id="" class="form-control">
        </div>
    </div>
    <br></br>
    
    <!-- <button type='button' class='btn btn-primary center-block'>Simpan</button> -->
<button type='button' class='btn btn-primary center-block'>Cetak</button>
@stop