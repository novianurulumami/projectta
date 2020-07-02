@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-6">
    </div>
    <div class="col-6">
    <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2"> <i class="fa fa-plus"></i>   Tambah Data Jurusan</button>
  <br></br>
        @if(session('sukses'))
            <div class="alert alert-success" role="alert">
            {{session('sukses')}}
            </div>
        @endif
    </div>
    <div class="box-body">
    <table class="table table-hover table-stripped table-bordered" >
                <thread>
                  <tr>
                    <th>ID</th>
                    <th>NAMA JURUSAN</th>
                    <th>AKSI</th>
                  </tr>
                </thread>
                @foreach($data_jurusan as $datajurusan)
                  <tr>
                  <td>{{$datajurusan->id_jurusan}}</td>
                  <td>{{$datajurusan->nama_jurusan}}</td>
                  <td> <a href=""><i class="fa fa-info-circle"></i></a>  | 
                  <a href=""> <i class="fa fa-trash"></i> </a> </a>  </td>
                  </tr>
                @endforeach
              </table>
              </div>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jurusan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form method="POST" action="{{route('tambahdatajurusan')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">JURUSAN</label>
                <input type="text" class="form-control" name="nama_jurusan" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jurusan">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>


<div class="container">
<div class="row">
<div class="col-6">
</div>
<div class="col-6">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Data Kelas</button>
<br></br>
    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
        {{session('sukses')}}
        </div>
    @endif
</div>

    <div class="box-body">
        <table class="table table-hover table-stripped table-bordered" >
                    <thread>
                      <tr>
                        <th>ID</th>
                        <th>NAMA KELAS</th>
                        <th>AKSI</th>
                      </tr>
                    </thread>
                    @foreach($data_kelas as $datakelas)
                      <tr>
                      <td>{{$datakelas->id_kelas}}</td>
                      <td>{{$datakelas->nama_kelas}}</td>
                      <td> <a href=""><i class="fa fa-info-circle"></i></a>  | 
                      <a href=""> <i class="fa fa-trash"></i> </a> </a>  </td>
                      </tr>
                    @endforeach
                  </table>
                  </div>

    <div class="container">
        <div class="row">
        <div class="col-6">
        </div>
        <div class="col-6">
        <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1"> <i class="fa fa-plus"></i>   Tambah Data Angka</button>
        <br></br>
            @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                {{session('sukses')}}
                </div>
            @endif
        </div>
                    <div class="box-body">
                        <table class="table table-hover table-stripped table-bordered" >
                                    <thread>
                                      <tr>
                                        <th>ID</th>
                                        <th>ANGKA KELAS</th>
                                        <th>AKSI</th>
                                      </tr>
                                    </thread>
                                    @foreach($data_kelasmeta as $datakelasmeta)
                                      <tr>
                                      <td>{{$datakelasmeta->id_kelas_meta}}</td>
                                      <td>{{$datakelasmeta->nama_angka}}</td>
                                      <td> <a href=""><i class="fa fa-info-circle"></i></a>  | 
                                      <a href=""> <i class="fa fa-trash"></i> </a> </a>  </td>
                                      </tr>
                                    @endforeach
                                  </table>
                                  </div>
                            </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Angka</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form method="POST" action="{{route('tambahdataangka')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Angka</label>
                    <input type="text" class="form-control" name="nama_angka" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="angka">
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </form>
                  </div>
              </div>
            </div>
          </div>
        </div>

        
@endsection