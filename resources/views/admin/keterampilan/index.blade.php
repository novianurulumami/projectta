@extends('layouts.admin')
@section('content')
<!DOCTYPE html>
<html>

<body>
         <!-- Button trigger modal -->
         <h3>Keterampilan</h3>
        </div>
        
        <form action="{{url('cariketerampilan')}}" method="GET">
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
        <br>
        <div class="box-body">
          <table class="table table-stripped table-bordered">
            <thead></thead>
              <tr>
                <th>NIS</th>
                <th>NO REKENING</th>
                <th>KELAS</th>
                <th>JURUSAN</th>
                <th>ANGKA</th>
                <th>NAMA SISWA</th>
                <th>NILAI KETERAMPILAN</th>
                <th>AKSI</th>
            </thead>
            @foreach($data_siswa as $datasiswa)
              <tr>
              <td>{{$datasiswa->nis}}</td>
              <td>{{$datasiswa->no_rekening}}</td>
              <td>{{$datasiswa->nama_kelas}}</td>
              <td>{{$datasiswa->nama_jurusan}}</td>
              <td>{{$datasiswa->nama_angka}}</td>
              <td>{{$datasiswa->nama}}</td>
              <td>{{$datasiswa->nilai_siswa}}</td>
              <td> <a href="{{route('editnilai', $datasiswa->id, 'edit')}}"><i class="fa fa-edit"></i></a>   |
              <a href="{{route('hapusnilai', $datasiswa->id, 'delete')}}"> <i class="fa fa-trash"></i> </a></td>
              </tr>
            @endforeach
            <tbody>
            </tbody>
          </table>
          {{ $data_siswa->links() }}
          <a href="{{route('cetakketerampilan')}}" class="btn btn-primary" target="_blank">CETAK</a>
        </div>
</html>
</body>
@stop