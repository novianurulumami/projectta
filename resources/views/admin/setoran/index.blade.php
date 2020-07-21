@extends('layouts.admin')
@section('content')
<h3><i class="fa fa-money"></i> Transaksi</h3>
@if(session('sukses'))
    <div class="alert alert-success" role="alert">
    {{session('sukses')}}
    </div>
@endif
@if(session('gagal'))
    <div class="alert alert-danger" role="alert">
    {{session('gagal')}}
    </div>
@endif
<form action="{{route('setoraninput')}}" method="GET">
<div class="form-group row">
    <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Tanggal Transaksi</h4></label>
   <!--  <input type="hidden" name="id" id="id"> -->
    <div class="col-md-2">
    <input type="text" value="<?php echo date("Y-m-d")?>" class="form-control" name="tgl_jual" aria-describedby="emailHelp" placeholder="TANGGAL JUAL" id="tgl_jual" disabled>
    </div>
</div> 
<div class="form-group row">
    <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>NIS</h4></label>
    <div class="col-md-4">
        <input type="text"  id="nis" name="nis"@if (!empty($datasiswa)) value={{$datasiswa->nis}} @endif class="form-control"> 
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
    </div>
</div>
</form>

<div class="form-group row">
    <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>No Rekening</h4></label>
    <div class="col-md-4">
        <input type="text" name="nama" disabled class="form-control" @if (!empty($datasiswa)) value="{{$datasiswa->no_rekening}}" @endif>
        <input type="hidden" @if (!empty($datasiswa)) value="{{$datasiswa->no_rekening}}" @endif  name="nama" class="form-control">
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Nama</h4></label>
    <div class="col-md-4">
    <input type="text" name="nama" disabled class="form-control" @if (!empty($datasiswa)) value="{{$datasiswa->nama}}" @endif>
    <input type="hidden" @if (!empty($datasiswa)) value="{{$datasiswa->nama}}" @endif  name="nama" class="form-control">
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Kelas</h4></label>
    <div class="col-md-4">
        <input type="text" name="kelas" disabled class="form-control" @if (!empty($datasiswa)) value="{{$datasiswa->nama_kelas}}" @endif>
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Jurusan</h4></label>
    <div class="col-md-4">
        <input type="text" name="jurusan" disabled class="form-control" @if (!empty($datasiswa)) value="{{$datasiswa->nama_jurusan}}" @endif>
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Angka</h4></label>
    <div class="col-md-4">
        <input type="text" name="angka" disabled class="form-control" @if (!empty($datasiswa)) value="{{$datasiswa->angka}}" @endif>
    </div>
</div>
<form action="{{route('setoran.store')}}" method="POST">
    {{csrf_field()}}
    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Jenis Transaksi</h4></label>
        <div class="col-md-4">
            <input type="hidden" @if (!empty($datasiswa)) value="{{$datasiswa->id}}" @endif  name="id_siswa" class="form-control">
            <select type="text"  name="status_transaksi" class="form-control">
                <option value="Setoran">Setoran</option>
                <option value="Penarikan">Penarikan</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Saldo</h4></label>
        <div class="col-md-4"> 
            <input type="text" id="" class="form-control" disabled @if (!empty($saldo)) value="{{'Rp. '.$saldo}}" @endif>
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Nominal</h4></label>
        <div class="col-md-4">
            <input type="number" name="nominal" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Petugas</h4></label>
        <div class="col-md-4">
            <input type="text" name="nama_petugas" class="form-control" required>
        </div>
    </div>
    <br></br>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <button class="btn btn-primary" type="submit" role="button" aria-pressed="true">Simpan</button>

</form>
<!-- <button type='button' class='btn btn-primary center-block'>Simpan</button> -->

@stop