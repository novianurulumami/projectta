<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{asset('css/cetak.css')}}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
    </style>
<h5>Detail Saldo Siswa</h5>
@if(session('sukses'))
    <div class="alert alert-success" role="alert">
    {{session('sukses')}}
    </div>
@endif
<?php 
use Illuminate\Support\Facades\DB;
?>
<div class="box-body">
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
          <td>{{$data_siswa->nis}}</td>
          <td>{{$data_siswa->no_rekening}}</td>
          <td>{{$data_siswa->nama}}</td>
          <td>{{$data_siswa->nama_kelas}}</td>
          <td>{{$data_siswa->nama_jurusan}}</td>
          <td>
            <?php $id = $data_siswa->id ;
            ?>
            Rp. {{ 
            DB::table('transaksi')->where('status_transaksi','Saldo Awal')->where('id_siswa',$data_siswa->id)->sum('nominal')+
            DB::table('transaksi')->where('status_transaksi','Setoran')->where('id_siswa',$data_siswa->id)->sum('nominal')}}
          </td>
          <td><?php $id = $data_siswa->id ;
            ?>
            Rp. {{ 
            DB::table('transaksi')->where('status_transaksi','Penarikan')->where('id_siswa',$data_siswa->id)->sum('nominal') }}
          </td>
          <td> 
            <?php $id = $data_siswa->id ;
            ?>
            Rp. {{ 
            DB::table('transaksi')->where('status_transaksi','Saldo Awal')->where('id_siswa',$data_siswa->id)->sum('nominal')+
            DB::table('transaksi')->where('status_transaksi','Setoran')->where('id_siswa',$data_siswa->id)->sum('nominal')-
            DB::table('transaksi')->where('status_transaksi','Penarikan')->where('id_siswa',$data_siswa->id)->sum('nominal') }}
          </td>
          </tr>
      </table>
<h5>Detail Transaksi Siswa</h5>
<div class="box-body">
    <table class="table table-stripped table-bordered">
      <thead>
        <tr>
          <th>Tanggal</th>
          <th>STATUS TRANSAKSI</th>
          <th>DEBIT</th>
          <th>KREDIT</th>
      </thead>
      
      <tbody>
        @foreach ($transaksi as $item)
      <tr>
        <td> {{date("d/m/Y",strtotime($item->created_at))}} </td>
        <td> {{$item->status_transaksi}} </td>
        <td> {{$item->status_transaksi == 'Setoran' ? $item->nominal : '' }}
          {{$item->status_transaksi == 'Saldo Awal' ? $item->nominal : '' }}
          {{$item->status_transaksi == 'Penarikan' ? '-' : '' }}</td>
        <td>{{$item->status_transaksi == 'Penarikan' ? $item->nominal : '-' }}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
</div>

</body>
</html>