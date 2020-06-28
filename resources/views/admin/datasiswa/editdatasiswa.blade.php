@extends('layouts.admin')
@section('content')
<div class="container">
<!-- Button trigger modal -->
<h3>Data Siswa</h3>
    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
        {{session('sukses')}}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
        <form method="POST" action="{{route('updatedata', $datasiswa->id, 'update')}}">
          {{csrf_field()}}
          <div class="form-group">
            <label for="exampleInputEmail1">NIS</label>
          <input type="text" class="form-control" name="nis" value="{{$datasiswa->nis}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIS">
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">NO REKENING</label>
            <input type="text" class="form-control" name="no_rekening" value="{{$datasiswa->no_rekening}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NO REKENING">
          </div>
  
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <input name="nama" value="{{$datasiswa->nama}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap">
          </div>
  
          <div class="form-group">
            <label for="exampleInputEmail1">Tahun Angkatan</label>
            <input name="tahun_angkatan" value="{{$datasiswa->tahun_angkatan}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tahun Angkatan">
          </div>
  
          <div class="form-group">
            <label for="exampleFormControlSelect1">Pilih Kelas</label>
            <select name="kelas" class="form-control" id="exampleFormControlSelect1">
              {{-- @foreach ($kelas as $item)
                <option value="{{$item->id_kelas}}"> {{$item->nama_kelas}}</option>
              @endforeach --}}
            </select>
          </div>
          
          <div class="form-group">
            <label for="exampleFormControlSelect1">Pilih Jurusan</label>
            <select name="jurusan" class="form-control" id="exampleFormControlSelect1">
              {{-- @foreach ($jurusan as $item)
                <option value="{{$item->id_jurusan}}"> {{$item->nama_jurusan}}</option>
              @endforeach --}}
            </select>
          </div>
  
          <div class="form-group">
            <label for="exampleFormControlSelect1">Pilih Angka</label>
            <select name="angka" class="form-control" id="exampleFormControlSelect1">
              {{-- @foreach ($kelasmeta as $item)
                <option value="{{$item->id_kelasmeta}}"> {{$item->nama_angka}}</option>
              @endforeach --}}
            </select>
          </div>
  
          <div class="form-group">
            <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
              <option>Laki-Laki</option>
              <option>Perempuan</option>
            </select>
          </div>
  
          <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <input name="alamat" value="{{$datasiswa->alamat}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat">
          </div>
  
          <div class="form-group">
            <label for="exampleInputEmail1">No Telepon</label>
            <input name="no_telepon" value="{{$datasiswa->no_telepon}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No Telepon">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div>
@endsection