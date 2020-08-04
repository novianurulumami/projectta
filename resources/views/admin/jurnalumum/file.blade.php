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
<h6>JURNAL UMUM</h6>
</div> 

            <div class="box-body">
                <table class="table table-stripped table-bordered">
                    <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Keterangan transaksi</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                    </thead>
                    <tbody>
                      @foreach ($data_siswa as $datasiswa)
                      <tr>
                      <td>{{date("d/m/Y",strtotime($datasiswa->created_at))}}</td>
                      <td>
                        @if ($datasiswa->status_transaksi == 'Setoran' || $datasiswa->status_transaksi == 'Saldo Awal')
                          Kas <br> &nbsp;&nbsp;&nbsp;&nbsp; Hutang <br>  ({{$datasiswa->status_transaksi.' '.$datasiswa->nama}})
                        @elseif ($datasiswa->status_transaksi == 'Penarikan')
                          Hutang <br> &nbsp;&nbsp;&nbsp;&nbsp; Kas <br>  ({{$datasiswa->status_transaksi.' '.$datasiswa->nama}})
                        @endif
                      </td>
                      <td>
                        @if ($datasiswa->status_transaksi == 'Setoran' || $datasiswa->status_transaksi == 'Saldo Awal')
                          {{$datasiswa->nominal}} <br> -
                        @elseif ($datasiswa->status_transaksi == 'Penarikan')
                        - <br>{{$datasiswa->nominal}}
                        @endif
                      </td>
                      <td>
                        @if ($datasiswa->status_transaksi == 'Setoran' || $datasiswa->status_transaksi == 'Saldo Awal')
                        - <br>{{$datasiswa->nominal}}
                        @elseif ($datasiswa->status_transaksi == 'Penarikan')
                        {{$datasiswa->nominal}} <br> -
                        @endif
                      </td>
                      </tr>
                      @endforeach
                      <tr>
                        <td colspan="2">
                          <b>Total :</b>
                        </td>
                        <td>{{$total}}</td>
                        <td>{{$total}}</td>
                      </tr>
                    </tbody>
                    {{-- @if ($data_siswa->currentPage()==$data_siswa->lastPage()) --}}
  
                    {{-- @endif --}}
                   
                </table>
</div>
<script type="text/javascript">

    $('.date').datepicker({  

       format: 'mm-dd-yyyy'

     });  

</script> 
</body>
</html>