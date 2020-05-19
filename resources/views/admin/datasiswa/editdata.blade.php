@extends('layouts.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{asset('css/dropdown.css')}}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style media="screen">
        .left{
            float: left;
            display: block;
        }
        .right{
            float: right;
            display: block;
        }
    </style>
</head>
<div class="content-wrapper">
    <script>
    $(document).ready(function(e){

      $('.formpengguna').submit(function(){

        var pengguna = $(".required").filter(function() { return $(this).val() === ''; });
        console.log(pengguna.length);
        

        if (pengguna.length == 0 ) {

          $.ajax({
              url : $(this).attr('action'),

              data : $(this).serialize(),
              type : 'post',
              cache : false,
              dataType : 'json',
              beforeSend : function(){
                $('.buttonsave').attr('disabled', 'disabled');
                $('.buttonsave').html('<i class="fa fa-spin fa-spinner"></i> Sedang Proses');
              },
              complete: function(){
                 $('.buttonsave').removeAttr('disabled');
                 $('.buttonsave').html('<i class="fa fa-save"></i> Save');
              },
              error: function(e){
                swal('Error', e, 'error');
              },
              success: function(data){

                 $("[data-dismiss=modal]").trigger({ type: "click" });
                 swal({
                        title: "Are you sure?",
                        text: "Data Berhasil Di Input!",
                        type: "success"
                      },
                       function(){
                          window.location = "http://localhost/trystore/index.php/menu/pengguna";
                    
                  });
                 
              } 
            });

         }else{

          swal({
            type: 'error',
            title: 'Oops...',
            text: 'Anda harus mengisi data dengan lengkap !',
          })
            // alert('Anda harus mengisi data dengan lengkap !');
        }
          return false;

      })

     })
 </script>



 <script>
   function select_data($id,$nama_lengkap,$username,$password,$groupuser){
    $("#id").val($id);
     $("#nama_lengkap").val($nama_lengkap);
      $("#username").val($username);
      $("#password").val($password);
       $("#id_groupuser").val($groupuser);
   }

   function refresh() {
    $("#id").val("");
     $("#nama_lengkap").val("");
     $("#username").val("");
     $("#password").val("");
     $("#id_groupuser").val("");
   }

 </script>

<section class="content">

      <div class="box">  
        <div class="box-header">
        
         <!-- Button trigger modal -->
         <h3>Edit Data Kelas</h3>
        </div>
        <div class="dropdown">
            <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-info active" data-target="#" href="/page.html">
                Jurusan <span class="caret"></span>
            </a>
    		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
            <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Akuntansi</a>
                <ul class="dropdown-menu">
                  <li class="dropdown-submenu">
                    <a href="#">X AK</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    	<li><a href="#">4</a></li>
                    </ul>
                    <a href="#">XI AK</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    	<li><a href="#">4</a></li>
                    </ul>
                    <a href="#">XII AK</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    	<li><a href="#">4</a></li>
                    </ul>
                  </li>
                </ul>
              </li>

              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Multimedia</a>
                <ul class="dropdown-menu">
                  <li class="dropdown-submenu">
                    <a href="#">X MM</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                    	<li><a href="#">2</a></li>
                    </ul>
                    <a href="#">XI MM</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                    	<li><a href="#">2</a></li>
                    </ul>
                    <a href="#">XII MM</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                    	<li><a href="#">2</a></li>
                    </ul>
                  </li>
                </ul>
              </li>

              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Pemasaran</a>
                <ul class="dropdown-menu">
                  <li class="dropdown-submenu">
                    <a href="#">X PM</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                    </ul>
                    <a href="#">XI PM</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                    </ul>
                    <a href="#">XII PM</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                    </ul>
                  </li>
                </ul>
              </li>

              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Perkantoran</a>
                <ul class="dropdown-menu">
                  <li class="dropdown-submenu">
                    <a href="#">X AP</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    	<li><a href="#">4</a></li>
                    </ul>
                    <a href="#">XI AP</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    	<li><a href="#">4</a></li>
                    </ul>
                    <a href="#">XII AP</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    	<li><a href="#">4</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
        </div>
        <br></br>
        <a href="#" class="btn btn-info active right" role="button" data-toggle="modal" data-target="#exampleModal" onclick="refresh()">Edit Kelas</a>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EDIT DATA KELAS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form method="post" action="http://localhost/trystore/index.php/menu/pengguna/simpan" enctype="multipart/form-data" class="formpengguna">
            <div class="form-group">

            
            <div class="form-group">
              <label >PILIH KELAS</label>
              <select class="form-control required" name="groupuser" id="groupuser" required>
                                         <option value="113">X</option>
                                          <option value="114">XI</option>
                                          <option value="115">XII</option>
                                </select>
            </div>

            <div class="form-group">
              <label >PILIH JURUSAN</label>
              <select class="form-control required" name="groupuser" id="groupuser" required>
                                         <option value="113">AKUNTANSI</option>
                                          <option value="114">MULTIMEDIA</option>
                                          <option value="115">PEMASARAN</option>
                                          <option value="116">PERKANTORAN</option>
                                </select>
            </div>

            <div class="form-group">
              <label >PILIH ANGKA</label>
              <select class="form-control required" name="groupuser" id="groupuser" required>
                                         <option value="113">1</option>
                                          <option value="114">2</option>
                                          <option value="115">3</option>
                                          <option value="116">4</option>
                                          <option value="115">5</option>
                                          <option value="116">6</option>
                                </select>
            </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary buttonsave" value="save"><i class="fa fa-save"></i> Simpan</button>
          </div>
          </form>
          </div>
        </div>
        </div>
        </div>
        <div class="col-4">
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Select All</label>

         </div>
      </div>
      <div class="box-body">
          <table class="table table-stripped table-bordered">
            <thread>
              <tr>
                <th> </th>
                <th>NO</th>
                <th>KELAS</th>
                <th>NIS</th>
                <th>NAMA SISWA</th>
              </tr>
            </thread>
            <tbody>
            </tbody>
          </table>
        </div>
        <nav aria-label="...">
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
        <a href="#" class="btn btn-info active right" role="button" aria-pressed="true">Keluar</a>
      </div>
      
     </section>
</html>
@stop