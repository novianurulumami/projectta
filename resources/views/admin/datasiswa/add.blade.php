@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="refresh()"> <i class="fa fa-plus"></i>   Tambah Data </button>
        <br></br>
        </div>
        <div class="box-body">
          <table class="table table-stripped table-bordered">
            <thread>
              <tr>
                <th>NO ID</th>
                <th>NIS</th>
                <th>NAMA SISWA</th>
                <th>KELAS</th>
                <th>THN ANGKATAN</th>
                <th>JENIS KELAMIN</th>
                <th>ALAMAT</th>
                <th>NO. TELP</th>
              </tr>
            </thread>
            <tbody>
              <tr>
                              </tr>
            </tbody>
          </table>
        </div>
        <button type='button' class='btn btn-primary center-block'> Simpan </button>
      </div>
      <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">TAMBAH DATA SISWA</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form method="post" action="http://localhost/trystore/index.php/menu/pengguna/simpan" enctype="multipart/form-data" class="formpengguna">
            <div class="form-group">

              <div class="form-group">
              <label for="exampleInputEmail1">NAMA LENGKAP</label>
              <input type="hidden" name="id" id="id">
              <input type="text" class="form-control required" name="nama_lengkap" aria-describedby="emailHelp" placeholder="" id="nama_lengkap">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">NIS</label>
              <!-- <input type="hidden" name="id" id="id"> -->
              <input type="text" class="form-control required" name="username" aria-describedby="emailHelp" placeholder="" id="username">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">TAHUN ANGKATAN</label>
             <!--  <input type="hidden" name="id" id="id"> -->
              <input type="password" class="form-control required" name="password" aria-describedby="emailHelp" placeholder="" id="password">
            </div>

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

            <div class="form-group">
            
              <label >PILIH JENIS KELAMIN</label>
              <select class="form-control required" name="groupuser" id="groupuser" required>
                                         <option value="113">LAKI-LAKI</option>
                                          <option value="114">PEREMPUAN</option>
                                </select>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">ALAMAT</label>
              <!-- <input type="hidden" name="id" id="id"> -->
              <input type="text" class="form-control required" name="username" aria-describedby="emailHelp" placeholder="" id="username">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">NOMER TELEPON</label>
             <!--  <input type="hidden" name="id" id="id"> -->
              <input type="password" class="form-control required" name="password" aria-describedby="emailHelp" placeholder="" id="password">
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
     </section>
@stop