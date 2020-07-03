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
        <form method="POST" action="{{route('updatenilai', $datasiswa->id, 'update')}}">
          {{csrf_field()}}
          <div class="form-group">
            <label for="exampleInputEmail1">Nilai Keterampilan</label>
          <input type="text" class="form-control" name="nilai_siswa" value="{{$datasiswa->nilai_siswa}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai siswa">
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