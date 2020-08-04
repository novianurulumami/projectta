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
            <button class="btn btn-default" type="submit" ><i class="fa fa-search"></i>
            </button>
          </ul>
        </form>
        <br></br>
        <form action="{{route('datakelasUpdate')}}" method="POST">

        <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="well" style="overflow: auto">
            <div class="form-group">
              <label >PILIH KELAS</label>
              <select class="form-control required" name="kelas_awal" id="groupuser" required>
                @foreach ($kelas as $key => $item)
                <option value="{{$item->id_kelas}}" {{($item->id_kelas == $input->id_kelas) ? "selected" : ""}}>
                  {{$item->nama_kelas}}</option>
                @endforeach
              </select>
            </div>
          </div>
  </div>
  <div class="col-md-6 col-sm-12 col-xs-12">
    <div class="well" style="overflow: auto">
      <div class="form-group">
        <label >PILIH KELAS</label>
        <select class="form-control required" name="kelas_ubah" id="groupuser" required>
          @foreach ($kelas as $key => $item)
          <option value="{{$item->id_kelas}}" {{($item->id_kelas == $input->id_kelas) ? "selected" : ""}}>
            {{$item->nama_kelas}}</option>
          @endforeach
        </select>
      </div>
      <button class="btn btn-primary" type="submit"  onclick="return confirm('Ubah permanen data ini?')">Ubah</button>
    </div>
</div>
</form>

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