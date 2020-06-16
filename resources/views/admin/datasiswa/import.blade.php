@extends('layouts.admin')
@section('content')
<h3>Import Data</h3>
<br></br>
<form>
  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
</form>
<br></br>
<form action="{{route('cari')}}" method="GET">
  <input type="text" name="cari" placeholder="Cari Nama Siswa ...." value="{{ old('cari') }}">
  <input type="submit" value="CARI">
</form>
<button type='button' class='btn btn-primary center-block'>Simpan</button>
@stop