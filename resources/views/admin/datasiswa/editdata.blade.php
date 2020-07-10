@extends('layouts.admin')
@section('content')

      <div class="box">  
        <div class="box-header">
        
         <!-- Button trigger modal -->
         <h3>Edit Data Kelas</h3>
        </div>
        <form action="{{url('caridatakelas')}}" method="GET">
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
            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i>
            </button>
          </ul>
        </form>

        <br></br>
        <a href="#" class="btn btn-info active right" role="button" data-toggle="modal" data-target="#exampleModal" onclick="refresh()">Edit Kelas</a>
        <br></br>
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

      <div class="box-body">
          <table class="table table-hover table-stripped table-bordered">
            <thead>
              <tr>
                <th>KELAS</th>
                <th>JURUSAN</th>
                <th>ANGKA</th>
                <th>NIS</th>
                <th>NAMA SISWA</th>
              </tr>
            </thead>
            @foreach($data_siswa as $datasiswa)
              <tr>
              <td>{{$datasiswa->nama_kelas}}</td>
              <td>{{$datasiswa->nama_jurusan}}</td>
              <td>{{$datasiswa->nama_angka}}</td>
              <td>{{$datasiswa->nis}}</td>
              <td>{{$datasiswa->nama}}</td>
              </tr>
            @endforeach
          </table>
          {{ $data_siswa->links() }}
        </div>
        
      </div>

@endsection