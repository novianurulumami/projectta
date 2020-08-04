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

<h3>Jurnal Umum</h3>
<form action="{{route('jurnalumum.index')}}" method="GET">
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

<br>
<div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" style="text-transform: capitalize;">
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                 
                       <label for="nama">Periode :</label>
                     <div class="well" style="overflow: auto">
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 8px;">
                           
                      <div class="input-group">
                          <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                      <input type="date" class="form-control" name="tanggalAwal" @if (empty($input->tanggalAwal)) value="{{ date('Y-m-d',strtotime('-1 Week'))}}" @else value="{{$input->tanggalAwal}}" @endif >
                      </div>

                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding-top: 8px;">
                        <p style="text-align: center;">Sampai</p>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 8px;">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                            <input type="date" class="form-control" name="tanggalAkhir" @if (empty($input->tanggalAkhir)) value="{{ date('Y-m-d')}}" @else value="{{$input->tanggalAkhir}}" @endif>
                      </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 8px;">
                      <button type="submit" class="btn btn-success btn-sm">Submit</button>
                        
                    </form> 
                        
                    </form>   
                         
                      </div>
                    </div>
                   
                  </div>
                </div>
              </div>

<div class="container-fluid">
    <div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
    </div>
    </div>
    <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" style="text-transform: capitalize;">
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                                
                       <label for="nama">jurnal</label>
                     <div class="well" style="overflow: auto">
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 8px;">
                      
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
                            </tbody>
                            @if ($data_siswa->currentPage()==$data_siswa->lastPage())
                            <tfoot>
                              <td colspan="2">
                                <b>Total :</b>
                              </td>
                              <td>{{$total}}</td>
                              <td>{{$total}}</td>
                            </tfoot>
                            @endif
                           
                        </table>
          {{ $data_siswa->links() }}
                   
                         
                      </div>
                    </div>
                   
                  </div>
                </div>
              </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
    </div>
    </div>
</div>
<form action="{{route('cetakjurnal')}}" method="POST">
  <input type="hidden" name="id_kelas" id="" value="{{$input->id_kelas}}">
  <input type="hidden" name="id_jurusan" id="" value="{{$input->id_jurusan}}">
  <input type="hidden" name="id_kelas_meta" id="" value="{{$input->id_kelas_meta}}">
  <input type="hidden" name="cari" id="" value="{{$input->cari}}">
  <input type="hidden" name="tanggalAwal" id="" value="{{$input->tanggalAwal}}">
  <input type="hidden" name="tanggalAkhir" id="" value="{{$input->tanggalAkhir}}">
  <button type="submit" class="btn btn-primary" target="_blank">CETAK</button>
</form>


<script type="text/javascript">

    $('.date').datepicker({  

       format: 'mm-dd-yyyy'

     });  

</script>  



</body
@stop