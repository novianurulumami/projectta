<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{asset('css/cetak.css')}}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
		<h5>Nilai Siswa Praktik SMK PGRI Rogojampi</h4>
 
<div class="box-body">
  <table class="table table-stripped table-bordered">  
    <thead>  
    <tr>
        <th>NIS</th>
        <th>NO REKENING</th>
        <th>KELAS</th>
        <th>JURUSAN</th>
        <th>ANGKA</th>
        <th>NAMA SISWA</th>
        <th>NILAI KETERAMPILAN</th>
      </tr>
      <thead>
        <tbody>
        @foreach($data_siswa as $datasiswas)
          <tr>
          <td>{{$datasiswas->nis}}</td>
          <td>{{$datasiswas->no_rekening}}</td>
          <td>{{$datasiswas->nama_kelas}}</td>
          <td>{{$datasiswas->nama_jurusan}}</td>
          <td>{{$datasiswas->nama_angka}}</td>
          <td>{{$datasiswas->nama}}</td>
          <td>{{$datasiswas->nilai_siswa}}</td>
      </tr>
    @endforeach
  </tbody>
  </table>
</div>

</body>
</html>