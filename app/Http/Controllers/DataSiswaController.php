<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use Illuminate\Support\Facades\DB;

class DataSiswaController extends Controller
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
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka');
        if(!empty($request->cari)){
            $data_siswa = $data_siswa->where('nama','like',"%".$cari."%");
        }
        $data_siswa = $data_siswa->paginate(5);
        $kelas = \App\Kelas::all();
        $jurusan = \App\Jurusan::all();
        $kelasmeta = \App\KelasMeta::all();
        return view('admin.datasiswa.index', ['data_siswa' => $data_siswa->appends(['cari' => $request->cari]), 'kelas' => $kelas, 'jurusan' => $jurusan, 'kelasmeta' => $kelasmeta]);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
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

    // public function cari(Request $request)
	// {
	// 	// menangkap data pencarian
	// 	$cari = $request->cari;
 
    // 		// mengambil data dari table pegawai sesuai pencarian data
    //     $data_siswa = \App\Siswa::where('nama','like',"%".$cari."%")
	// 	->paginate();
 
    // 		// mengirim data pegawai ke view index
    //     return view('admin.datasiswa.index', ['data_siswa' => $data_siswa]);

	// }
}
