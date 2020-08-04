<?php

namespace App\Http\Controllers;
use App\Jurusan;
use App\Siswa;
use App\Kelas;
use App\KelasMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TambahDataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
		$cari = $request->cari;

        $data_siswa = DB::table('siswa1')->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('tahun_angkatan','tahun_angkatan.id_tahun_angkatan','=','siswa1.tahun_angkatan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka')
        ->orderBy('id_kelas')->orderBy('id_jurusan')->orderBy('id_kelas_meta');
        if(!empty($request->cari)){
            $data_siswa = $data_siswa->where('nama','like',"%".$cari."%");
        }
        if($request->id_kelas != ''){
            $data_siswa = $data_siswa->where('id_kelas',$request->id_kelas);    
        }
        if($request->id_jurusan != ''){
            $data_siswa = $data_siswa->where('id_jurusan',$request->id_jurusan);    
        }
        if($request->id_kelas_meta != ''){
            $data_siswa = $data_siswa->where('id_kelas_meta',$request->id_kelas_meta);    
        }
        $data_siswa = $data_siswa->paginate(10);
        $kelas = \App\Kelas::all();
        $jurusan = \App\Jurusan::all();
        $kelasmeta = \App\KelasMeta::all();
        $data_tahun = \App\TahunAngkatan::all();
        return view('admin.datasiswa.add',
        ['data_siswa' => $data_siswa->appends(['cari' => $request->cari]), 'kelas' => $kelas, 'data_tahun' => $data_tahun,
        'input' => $request,
        'jurusan' => $jurusan, 'kelasmeta' => $kelasmeta]);
        // echo json_encode($data_siswa);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request,[
            'nis' => 'required|numeric|unique:siswa1',
            'no_rekening' => 'required|numeric|unique:siswa1',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'angka' => 'required',
            'tahun_angkatan' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
         ]);
        \App\Siswa::create($request->all());
        return redirect('tambah')->with('sukses', 'Data Berhasil Diinput');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       // $datasiswa = \App\Siswa::find($id);
        $datasiswa = DB::table('siswa1')->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('tahun_angkatan','tahun_angkatan.id_tahun_angkatan','=','siswa1.tahun_angkatan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka')
        ->where('siswa1.id', $id)
        ->first();
        $kelas = \App\Kelas::all();
        $jurusan = \App\Jurusan::all();
        $kelasmeta = \App\KelasMeta::all();
        $data_tahun = \App\TahunAngkatan::all();
        return view('admin.datasiswa.detaildatasiswa', ['data_tahun' => $data_tahun], ['datasiswa' => $datasiswa], ['kelas' => $kelas], ['jurusan' => $jurusan], ['kelasmeta' => $kelasmeta]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // //
        // $datasiswa = \App\Siswa::find($id);
        
        $datasiswa = DB::table('siswa1')->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('tahun_angkatan','tahun_angkatan.id_tahun_angkatan','=','siswa1.tahun_angkatan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka')
        ->where('siswa1.id', $id)
        ->first();;
        $kelas = \App\Kelas::all();
        $jurusan = \App\Jurusan::all();
        $kelasmeta = \App\KelasMeta::all();
        $data_tahun = \App\TahunAngkatan::all();
        return view('admin.datasiswa.editdatasiswa', ['data_tahun' => $data_tahun, 'datasiswa' => $datasiswa, 'kelas' => $kelas, 'jurusan' => $jurusan, 'kelasmeta' => $kelasmeta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datasiswa = \App\Siswa::find($id);
        $datasiswa->update($request->all());
        return redirect('tambah')->with('sukses', 'Data Berhasil Di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        //
        $datasiswa = \App\Siswa::find($id);
        $datasiswa->delete($datasiswa);
        return redirect('tambah')->with('sukses', 'Data Berhasil Di hapus');
    }
    
}
