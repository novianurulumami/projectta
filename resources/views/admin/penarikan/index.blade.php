@extends('layouts.admin')
@section('content')
<h3>Transaksi Penarikan</h3>
<div class="form-group row">
    <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>NIS</h4></label>
    <div class="col-md-6">
        <input id="" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Nama</h4></label>
    <div class="col-md-6">
        <input id="" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Kelas</h4></label>
    <div class="col-md-6">
        <input id="" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>
    </div>
</div>

<div class="form-group row">
<label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Jurnal</h4></label>
<div class="col-md-2">
    <select id="" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>
        <option value="111">Kas</option>
        <option value="211">Hutang</option>
    </select>
</div>
<div class="col-md-1">
<a href="#"><i class="fa fa-exchange"></i></a>
</div>
<div class="col-md-2">
    <select id="" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>
        <option value="111">Kas</option>
        <option value="211">Hutang</option>
    </select>
</div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Saldo</h4></label>
    <div class="col-md-6">
        <input id="" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Nominal</h4></label>
    <div class="col-md-6">
        <input id="" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-2 col-form-label font-weight-normal"><h4>Petugas</h4></label>
    <div class="col-md-6">
        <input id="" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>
    </div>
</div>
<br></br>
<a href="{{route('penarikancetak.index')}}" class="btn btn-primary" role="button" aria-pressed="true">Simpan</a>

<!-- <button type='button' class='btn btn-primary center-block'>Simpan</button> -->

@stop