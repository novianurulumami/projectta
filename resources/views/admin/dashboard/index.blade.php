@extends('layouts.admin')
@section('content')
<h3>SIAPTASI (Sistem Aplikasi Tabungan Siswa)</h3>
<div class="panel">
     <div id="grafiktransaksi"></div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
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
         categories: [
             'januari',
             'Februari'
         ],
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
             '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
         name: 'Tokyo',
         data: [49.9, 71.5]
 
     }, {
         name: 'New York',
         data: [83.6, 78.8]
 
     }, {
         name: 'London',
         data: [48.9, 38.8]
 
     }]
 });
              
 </script>
@stop