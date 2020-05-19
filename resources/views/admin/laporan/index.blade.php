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
                  <div class="x_title" style="text-transform: capitalize;">
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                 
                      <form action="?module=laporan-transaksi&aksi=periode"  enctype="multipart/form-data" method="POST">
                
                       <label for="nama">Periode :</label>
                     <div class="well" style="overflow: auto">
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 8px;">
                       
                      <div class="input-group">
                          <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                            <input type="text" class="date form-control" >
                      </div>

                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding-top: 8px;">
                        <p style="text-align: center;">Sampai</p>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 8px;">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                            <input type="text" class="date form-control" >
                      </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 8px;">
                      <button type="submit" class="btn btn-success btn-sm">Submit</button>
                        
                    </form>   
                         
                      </div>
                    </div>
                   
                  </div>
                </div>
              </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
    </div>
    </div>
    <div class="form-group row">
    <label for="email" class="col-md-4 col-form-label font-weight-normal"><h5>Saldo Awal</h5></label>
    <div class="col-md-4">
        <input id="" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>
    </div>
    <label for="email" class="col-md-4 col-form-label font-weight-normal"><h5>Total Debit</h5></label>
    <div class="col-md-4">
        <input id="" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>
    </div>
    <label for="email" class="col-md-4 col-form-label font-weight-normal"><h5>Total Kredit</h5></label>
    <div class="col-md-4">
        <input id="" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>
    </div>
    <label for="email" class="col-md-4 col-form-label font-weight-normal"><h5>Saldo Akhir</h5></label>
    <div class="col-md-4">
        <input id="" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>
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
            <tbody>
            </tbody>
          </table>
        </div><nav aria-label="...">
        <ul class="pagination">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>

        <button type='button' class='btn btn-primary center-block'> Cetak </button>
<script type="text/javascript">

    $('.date').datepicker({  

       format: 'mm-dd-yyyy'

     });  

</script>  



</body
@stop