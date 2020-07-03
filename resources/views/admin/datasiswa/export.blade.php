@extends('layouts.admin')
@section('content')
<h3>Eksport Data</h3>
<br></br>
<form>
  <div class="form-group">
    <a href="{{route('exportdata')}}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
  </div>
</form>
@stop