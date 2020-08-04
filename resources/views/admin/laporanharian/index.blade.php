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

<h3>Laporan Transaksi Harian</h3>
    <div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
      <form action="{{route('tambahsaldoharian')}}" method="POST">
        {{csrf_field()}}
        <div class="well" style="overflow: auto">
        <label for="email" class="col-md-12 col-form-label font-weight-normal"><h5>Masukkan Saldo Harian :</h5></label>
        <input type="number" name="saldo_harian" class="form-control" required>
        <br></br>
          <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">Submit</button>
              <i class="fa fa-search"></i>
          </button>
          </span>
        </div>
      </form>
    </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
    <div class="form-group row">
    <label for="email" class="col-md-4 col-form-label font-weight-normal"><h5>Saldo Tunai Hari Ini</h5></label>
    <div class="col-md-6">
    <input id="" type="" class="form-control " name="" value="{{'Rp. '.$saldoawal}}" required disabled>
    </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-md-4 col-form-label font-weight-normal"><h5>Total Saldo Awal Hari Ini</h5></label>
      <div class="col-md-6">
          <input id="" type="" class="form-control " name="" value="{{'Rp. '.$saldoawal2}}" disabled>
    </div>
    </div>
    <div class="form-group row">
    <label for="email" class="col-md-4 col-form-label font-weight-normal"><h5>Total Setoran Hari Ini</h5></label>
    <div class="col-md-6">
        <input id="" type="" class="form-control " name="" value="{{'Rp. '.$setoran }}" disabled>
    </div>
    </div>
    <div class="form-group row">
    <label for="email" class="col-md-4 col-form-label font-weight-normal"><h5>Total Penarikan Hari Ini</h5></label>
    <div class="col-md-6">
    <input id="" type="" class="form-control " name="" value="{{'Rp. '.$penarikan}}" disabled>
    </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-md-4 col-form-label font-weight-normal"><h5>Total Saldo Akhir Hari Ini</h5></label>
      <div class="col-md-6">
      <input id="" type="" class="form-control " name="" value="{{'Rp. '.$saldoakhir1}}" disabled>
      </div>
      </div>
    <div class="form-group row">
    <label for="email" class="col-md-4 col-form-label font-weight-normal"><h5>Saldo Non Tunai</h5></label>
    <div class="col-md-6">
    <input id="" type="" class="form-control " name="" value="{{'Rp. '.$saldoakhir}}" disabled>
    </div>
    </div>
  </div>
</div>
                <br>

    <div class="box-body">
          <table class="table table-stripped table-bordered">
            <thead>
              <tr>
                <th>TANGGAL</th>
                <th>SALDO TUNAI</th>
                <th>JUMLAH DEBIT</th>
                <th>JUMLAH KREDIT</th>
                <th>SALDO NON TUNAI</th>
            </thead>
            @foreach($data_transaksi as $datatransaksi)
              <tr>
              <td></td>
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