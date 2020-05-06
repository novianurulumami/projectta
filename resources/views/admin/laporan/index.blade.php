@extends('layouts.admin')
@section('content')
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
                            <input type="text" class="form-control " id="tanggal"  value="01-05-2020"  name="tanggal1"  >
                      </div>

                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding-top: 8px;">
                        <p style="text-align: center;">Sampai</p>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 8px;">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                            <input type="text" class="form-control " value="01-05-2020" id="tanggal2"   name="tanggal2"  >
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
@stop