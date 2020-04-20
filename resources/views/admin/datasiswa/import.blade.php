@extends('layouts.admin')
@section('content')
<h3>Import Data</h3>
<br></br>
<form class="form-inline">
  <select class="custom-select" id="inlineFormCustomSelectPref">
    <option selected>Choose...</option>
  </select>
  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">No Choose File</label>
</form>
<br></br>
<button type='button' class='btn btn-primary center-block'>Simpan</button>
@stop