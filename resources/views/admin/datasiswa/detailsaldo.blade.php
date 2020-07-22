@extends('layouts.admin')
@section('content')
<div class="container">
<!-- Button trigger modal -->
<h3>Detail Saldo Siswa</h3>
    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
        {{session('sukses')}}
        </div>
    @endif

    <div class="box-body">
        <form method="POST" action="{{route('detailsaldosiswa', $datasiswa->id, 'detailsaldo')}}">
          {{csrf_field()}}
          <table class="table table-hover table-stripped table-bordered" >
            <thead>
              <tr>
                <th>NIS</th>
                <th>NO REKENING</th>
                <th>NAMA LENGKAP</th>
                <th>KELAS</th>
                <th>JURUSAN</th>
                <th>DEBIT</th>
                <th>KREDIT</th>
                <th>JUMLAH SALDO</th>
              </tr>
            </thead>
              <tr>
              <td>{{$datasiswa->nis}}</td>
              <td>{{$datasiswa->no_rekening}}</td>
              <td>{{$datasiswa->nama}}</td>
              <td>{{$datasiswa->nama_kelas}}</td>
              <td>{{$datasiswa->nama_jurusan}}</td>
              <td>{{$datasiswa->nama_angka}}</td>
              <td>{{$datasiswa->tahun}}</td>
              <td>{{$datasiswa->jenis_kelamin}}</td>
              </tr>
          </table>
          {{-- <div class="form-group">
            <p>NIS : {{$datasiswa->nis}}</p>
            <p>No Rekening : {{$datasiswa->no_rekening}}</p>
            <p>Nama Lengkap : {{$datasiswa->nama}}</p>
            <p>Tahun Angkatan : {{$datasiswa->tahun_angkatan}}</p>
            <p>Kelas : {{$datasiswa->nama_kelas}}</p>
            <p>Jurusan : {{$datasiswa->nama_jurusan}}</p>
            <p>Angka : {{$datasiswa->nama_angka}}</p>
            <p>Jenis Kelamin : {{$datasiswa->jenis_kelamin}}</p>
            <p>Alamat : {{$datasiswa->alamat}}</p>
            <p>No Telepon : {{$datasiswa->no_telepon}}</p>
          </div> --}}
        </form>
</div>
@endsection