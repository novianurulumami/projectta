@extends('layouts.admin')
@section('content')
<div class="container">
<!-- Button trigger modal -->
<h3>Data Nilai</h3>
    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
        {{session('sukses')}}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
        <form method="POST" action="{{route('updatenilai', $datasiswa->id_siswa, 'update')}}">
          {{csrf_field()}}
          <div class="form-group">
            <label for="exampleInputEmail1">Nilai Keterampilan</label>
          <input type="text" class="form-control" name="nis" value="{{$datasiswa->nis}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIS">
          </div>
          
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div>
@endsection