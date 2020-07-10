<?php

namespace App\Http\Controllers;
use App\Jurusan;
use App\Siswa;
use App\Kelas;
use App\KelasMeta;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;

class KeterampilanController extends Controller
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
        if($request->id_kelas != ''){
            $data_siswa = $data_siswa->where('id_kelas',$request->id_kelas);    
        }
        if($request->id_jurusan != ''){
            $data_siswa = $data_siswa->where('id_jurusan',$request->id_jurusan);    
        }
        if($request->id_kelas_meta != ''){
            $data_siswa = $data_siswa->where('id_kelas_meta',$request->id_kelas_meta);    
        }
        $data_siswa = $data_siswa->paginate(5);
        $kelas = \App\Kelas::all();
        $jurusan = \App\Jurusan::all();
        $kelasmeta = \App\KelasMeta::all();
        return view('admin.keterampilan.index',  ['data_siswa' => $data_siswa->appends(['cari' => $request->cari]), 'input' => $request, 'kelas' => $kelas, 'jurusan' => $jurusan, 'kelasmeta' => $kelasmeta]);
        // echo json_encode($data_siswa);
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
        $datasiswa = \App\Siswa::find($id);
        return view('admin.keterampilan.editnilaiketerampilan', ['datasiswa' => $datasiswa]);
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
        return redirect('updatenilaiketerampilan')->with('sukses', 'Data Berhasil Di update');
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
        return redirect('updatenilaiketerampilan')->with('sukses', 'Data Berhasil Di hapus');
    }

    public function cetak_pdf()
    {
        $data_siswa = DB::table('siswa1')->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka')->get();
        $datasiswa = \App\Siswa::all();
        $kelas = \App\Kelas::all();
        $jurusan = \App\Jurusan::all();
        $kelasmeta = \App\KelasMeta::all();
    	$pdf = PDF::loadview('admin.keterampilan.keterampilanpdf', ['datasiswa' => $datasiswa], ['data_siswa' => $data_siswa])->setPaper('A4', 'potrait');
    	return $pdf->stream('NilaiSiswa.pdf');
    }
}
