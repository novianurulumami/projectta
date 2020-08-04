<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jurusan;
use App\Siswa;
use App\Kelas;
use App\KelasMeta;

class EditDataKelasController extends Controller
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
        return view('admin.datasiswa.editdata',
         ['data_siswa' => $data_siswa->appends(['cari' => $request->cari]),
         'input' => $request,
         'kelas' => $kelas, 'jurusan' => $jurusan, 'kelasmeta' => $kelasmeta]);
        

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

    public function updateKelas(Request $request)
    {
        $angka_ubah;
        $jurusan_ubah;
        $data = Siswa::where('kelas',$request->kelas_awal);

        $data = $data->update([
            'kelas' => $request->kelas_ubah
            
        ]);

       return redirect('datakelas')->with('sukses', 'Data Berhasil Di update');
    }

}
