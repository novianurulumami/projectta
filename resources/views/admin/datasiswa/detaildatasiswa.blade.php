@extends('layouts.admin')
@section('content')
<div class="container">
<!-- Button trigger modal -->
<h3>Detail Data Siswa</h3>
    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
        {{session('sukses')}}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
        <form method="POST" action="{{route('detaildatasiswa', $datasiswa->id, 'detail')}}">
          {{csrf_field()}}
          <div class="form-group">
            <p>NIS : {{$datasiswa->nis}}</p>
            <p>No Rekening : {{$datasiswa->no_rekening}}</p>
            <p>Nama Lengkap : {{$datasiswa->nama}}</p>
            <p>Tahun Angkatan : {{$datasiswa->tahun_angkatan}}</p>
            <p>Kelas : {{$datasiswa->kelas}}</p>
            <p>Jurusan : {{$datasiswa->jurusan}}</p>
            <p>Angka : {{$datasiswa->angka}}</p>
            <p>Jenis Kelamin : {{$datasiswa->jenis_kelamin}}</p>
            <p>Alamat : {{$datasiswa->alamat}}</p>
            <p>No Telepon : {{$datasiswa->no_telepon}}</p>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection