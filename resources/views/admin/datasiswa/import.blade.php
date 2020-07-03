@extends('layouts.admin')
@section('content')
<h3>Import Data</h3>
<br></br>
<button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
  IMPORT EXCEL
</button>

<!-- Import Excel -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" action="{{route('importdatasiswa')}}" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
        </div>
        <div class="modal-body">

          {{ csrf_field() }}

          <label>Pilih file excel</label>
          <div class="form-group">
            <input type="file" name="file" required="required">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Import</button>
        </div>
      </div>
    </form>
  </div>
</div>
<br></br>
    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
        {{session('sukses')}}
        </div>
    @endif
</div>
<div class="box-body">
<table class="table table-hover table-stripped table-bordered" >
            <thread>
              <tr>
                <th>NIS</th>
                <th>NO REKENING</th>
                <th>NAMA SISWA</th>
                <th>KELAS</th>
                <th>JURUSAN</th>
                <th>ANGKA</th>
                <th>THN ANGKATAN</th>
                <th>JENIS KELAMIN</th>
                <th>ALAMAT</th>
              </tr>
            </thread>
            @foreach($data_siswa as $datasiswa)
            <tr>
            <td>{{$datasiswa->nis}}</td>
            <td>{{$datasiswa->no_rekening}}</td>
            <td>{{$datasiswa->nama}}</td>
            <td>{{$datasiswa->nama_kelas}}</td>
            <td>{{$datasiswa->nama_jurusan}}</td>
            <td>{{$datasiswa->nama_angka}}</td>
            <td>{{$datasiswa->tahun_angkatan}}</td>
            <td>{{$datasiswa->jenis_kelamin}}</td>
            <td>{{$datasiswa->alamat}}</td>
            </tr>
          @endforeach
        </table>
        {{ $data_siswa->links() }}
          </div>
    </div>
@stop