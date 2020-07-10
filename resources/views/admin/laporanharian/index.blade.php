@extends('layouts.admin')
@section('content')
<!DOCTYPE html>

<html>

<head>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

</head>

<body>

<h3>Laporan Transaksi</h3>
<div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">          
</div>
</div>
</div>

    <div class="box-body">
          <table class="table table-stripped table-bordered">
            <thread>
              <tr>
                <th>NIS</th>
                <th>NAMA SISWA</th>
                <th>KELAS</th>
                <th>JENIS TRANSAKSI</th>
                <th>DEBIT</th>
                <th>KREDIT</th>
                <th>SALDO</th>
            </thread>
            @foreach($data_siswa as $datasiswa)
              <tr>
              <td>{{$datasiswa->nis}}</td>
              <td>{{$datasiswa->nama}}</td>
              <td>{{$datasiswa->nama_kelas}}</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              </tr>
            @endforeach
            <tbody>
            </tbody>
          </table>
          {{ $data_siswa->links() }}

        <button type='button' class='btn btn-primary center-block'> Cetak </button>
<script type="text/javascript">

    $('.date').datepicker({  

       format: 'mm-dd-yyyy'

     });  

</script>  



</body
@stop