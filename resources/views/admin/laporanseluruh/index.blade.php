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



<h3>Laporan Transaksi Keseluruhan</h3>
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    </div>
    </div>
    <div class="form-group row">
    <div class="col-md-4">
      <label for="email" class="col-md-12 col-form-label font-weight-normal"><h5>Modal Awal Keseluruhan</h5></label>
      <input id="" type="" class="form-control " name="" value="{{'Rp. '.$saldoawal}}" required disabled>
    </div>
    <div class="col-md-4">
      <label for="email" class="col-md-12 col-form-label font-weight-normal"><h5>Modal Akhir Keseluruhan</h5></label>
        <input id="" type="" class="form-control " name="" value="{{'Rp. '.$saldoakhir}}" disabled>
    </div>
    </div>
    <div class="form-group row">
      
      </div>
      <div class="form-group row">
        <div class="col-md-4">
          <label for="email" class="col-md-12 col-form-label font-weight-normal"><h5>Saldo Dedit Keseluruhan</h5></label>
           <input id="" type="" class="form-control " name="" value="{{'Rp. '.$setoran }}" disabled>
        </div>
        <div class="col-md-4">
          <label for="email" class="col-md-12 col-form-label font-weight-normal"><h5>Saldo Kredit Keseluruhan</h5></label>
          <input id="" type="" class="form-control " name="" value="{{'Rp. '.$penarikan}}" disabled>
        </div>
        </div>
        
        <form action="{{url('carilaporanseluruh')}}" method="GET">
          <ul class="nav nav-tabs">
            <li class="dropdown">
              <select name="id_kelas" class="form-control" id="">
                <option value="" selected>Semua</option>
                @foreach ($kelas as $key => $item)
                <option value="{{$item->id_kelas}}" {{($item->id_kelas == $input->id_kelas) ? "selected" : ""}}>
                  {{$item->nama_kelas}}</option>
                @endforeach
              </select>
            </li>
            <li class="dropdown">
              <select name="id_jurusan" class="form-control" id="">
                <option value="" selected>Semua</option>
                @foreach ($jurusan as $key => $item )
                      <option value="{{$item->id_jurusan}}" {{$item->id_jurusan == $input->id_jurusan ? "selected" : ""}}>{{$item->nama_jurusan}}</option>
                @endforeach
              </select>
            </li>
            <li class="dropdown">
              <select name="id_kelas_meta" class="form-control" id="">
                <option value="" selected>Semua</option>
                @foreach ($kelasmeta as $key => $item)
                <option value="{{$item->id_kelas_meta}}" {{$item->id_kelas_meta == $input->id_kelas_meta  ? "selected" : ""}}>{{$item->nama_angka}}</option>
                 @endforeach
              </select>
            </li>
            <div class="input-group custom-search-form">
              <input type="text" name="cari" class="form-control" placeholder="Search..." value="{{ empty($input->cari) ? '' : $input->cari}}">
                <span class="input-group-btn">
                    <button class="btn btn-primary"  type="submit" value="CARI">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
          </ul>
        </form>
                <br>
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
            @foreach($data_siswa as $datasiswa)
              <tr>
              <td>{{date("d/m/Y",strtotime($datasiswa->created_at))}}</td>
              <td>{{$datasiswa->nis}}</td>
              <td>{{$datasiswa->nama}}</td>
              <td>{{$datasiswa->nama_kelas}}</td>
              <td>{{$datasiswa->status_transaksi}}</td>
              <td>
                {{$datasiswa->status_transaksi == 'Setoran' ? $datasiswa->nominal : '' }}
                {{$datasiswa->status_transaksi == 'Saldo Awal' ? $datasiswa->nominal : '' }}
                {{$datasiswa->status_transaksi == 'Penarikan' ? '-' : '' }}
              </td>
              <td>{{$datasiswa->status_transaksi == 'Penarikan' ? $datasiswa->nominal : '-' }}</td>
              </tr>
            @endforeach
            <tbody>
            </tbody>
          </table>
          {{ $data_siswa->links() }}

<script type="text/javascript">

    $('.date').datepicker({  

       format: 'mm-dd-yyyy'

     });  

</script>  



</body
@stop