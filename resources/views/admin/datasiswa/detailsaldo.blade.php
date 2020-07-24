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
              <td>{{$datasiswa->nis}}</td>
              <td>{{$datasiswa->no_rekening}}</td>
              <td>{{$datasiswa->nama}}</td>
              <td>{{$datasiswa->nama_kelas}}</td>
              <td>{{$datasiswa->nama_jurusan}}</td>
              <td><?php $id = $datasiswa->id ;
                ?>
                Rp. {{ 
                DB::table('transaksi')->where('status_transaksi','Saldo Awal')->where('id_siswa',$datasiswa->id)->sum('nominal')+
                DB::table('transaksi')->where('status_transaksi','Setoran')->where('id_siswa',$datasiswa->id)->sum('nominal')}}
              </td>
              <td><?php $id = $datasiswa->id ;
                ?>
                Rp. {{ 
                DB::table('transaksi')->where('status_transaksi','Penarikan')->where('id_siswa',$datasiswa->id)->sum('nominal') }}
              </td>
              <td> 
                <?php $id = $datasiswa->id ;
                ?>
                Rp. {{ 
                DB::table('transaksi')->where('status_transaksi','Saldo Awal')->where('id_siswa',$datasiswa->id)->sum('nominal')+
                DB::table('transaksi')->where('status_transaksi','Setoran')->where('id_siswa',$datasiswa->id)->sum('nominal')-
                DB::table('transaksi')->where('status_transaksi','Penarikan')->where('id_siswa',$datasiswa->id)->sum('nominal') }}
              </td>
              </tr>
          </table>

<h3>Detail Transaksi Siswa</h3>
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
        <td> {{$item->created_at}} </td>
        <td> {{$item->status_transaksi}} </td>
        <td> {{$item->status_transaksi == 'Setoran' ? $item->nominal : '' }}
          {{$item->status_transaksi == 'Saldo Awal' ? $item->nominal : '' }}
          {{$item->status_transaksi == 'Penarikan' ? '-' : '' }}</td>
        <td>{{$item->status_transaksi == 'Penarikan' ? $item->nominal : '-' }}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
    {{$transaksi->links()}}

    <a href="{{route('cetakdetailsaldo', $datasiswa->id, 'cetakdetailsaldo')}}" class="btn btn-primary" target="_blank">CETAK</a>

<script type="text/javascript">

$('.date').datepicker({  

 format: 'mm-dd-yyyy'

});  

</script>  
       
</div>
</div> 
@endsection