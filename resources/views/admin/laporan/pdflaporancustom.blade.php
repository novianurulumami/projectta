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
<div class="center">
<h6>SMK PGRI ROGOJAMPI</h6>
<h6>LAPORAN TRANSAKSI</h6>
</div> 

            <div class="box-body">
                <table class="table table-stripped table-bordered">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>NIS</th>
                      <th>NAMA SISWA</th>
                      <th>KELAS</th>
                      <th>JENIS TRANSAKSI</th>
                      <th>DEBIT</th>
                      <th>KREDIT</th>
                  </thead>
                  @foreach($data_siswa as $datasiswas)
                    <tr>
                    <td>{{date("d/m/Y",strtotime($datasiswas->created_at))}}</td>
                    <td>{{$datasiswas->nis}}</td>
                    <td>{{$datasiswas->nama}}</td>
                    <td>{{$datasiswas->nama_kelas}}</td>
                    <td>{{$datasiswas->status_transaksi}}</td>
                    <td>
                      {{$datasiswas->status_transaksi == 'Setoran' ? 'Rp. '.$datasiswas->nominal : '' }}
                      {{$datasiswas->status_transaksi == 'Saldo Awal' ? 'Rp. '.$datasiswas->nominal : '' }}
                      {{$datasiswas->status_transaksi == 'Penarikan' ? '-' : '' }}
                    </td>
                    <td>{{$datasiswas->status_transaksi == 'Penarikan' ? 'Rp. '.$datasiswas->nominal : '-' }}</td>
                    </tr>
                  @endforeach
                  <tbody>
                  </tbody>
                </table>
</div>
<script type="text/javascript">

    $('.date').datepicker({  

       format: 'mm-dd-yyyy'

     });  

</script> 
</body>
</html>