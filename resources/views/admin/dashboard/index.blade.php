@extends('layouts.admin')
@section('content')
<!DOCTYPE html>
<html>
<body>
<h3>SIAPTASI (Sistem Aplikasi Tabungan Siswa)</h3>
<div class="col-md-12 col-sm-12 col-xs-12">
     <div id="grafiktransaksi"></div>
</div>
<br><br>
<script src="{{asset('js/grafik.js')}}"></script>
<script>
Highcharts.chart('grafiktransaksi', {
     chart: {
         type: 'column'
     },
     title: {
         text: 'Laporan Transaksi'
     },
     subtitle: {
         text: ''
     },
     xAxis: {
         categories: {!!json_encode($bulan)!!},
         crosshair: true
     },
     yAxis: {
         min: 0,
         title: {
             text: 'Jumlah Transaksi'
         }
     },
     tooltip: {
         headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
         pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
             '<td style="padding:0"><b>RP. {point.y:.2f} </b></td></tr>',
         footerFormat: '</table>',
         shared: true,
         useHTML: true
     },
     plotOptions: {
         column: {
             pointPadding: 0.2,
             borderWidth: 0
         }
     },
     series: [{
        name: 'Saldo Awal',
        data: {!!json_encode($saldo)!!}

    }, {
        name: 'Setoran',
        data: {!!json_encode($setoran)!!}

    }, {
        name: 'Penarikan',
        data: {!!json_encode($penarikan)!!}

    }]
 });
              
 </script>
 </body>
</html>
 @stop
 