<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class JurnalUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $cari = $request->cari;
        $data_siswa = DB::table('transaksi')
        ->select('transaksi.*','siswa1.nama','siswa1.nis','kelas1.nama_kelas')
        ->join('siswa1','siswa1.id','=','transaksi.id_siswa')
        ->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka');

        $total = DB::table('transaksi')
        ->select('transaksi.*','siswa1.nama','siswa1.nis','kelas1.nama_kelas')
        ->join('siswa1','siswa1.id','=','transaksi.id_siswa')
        ->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka');

        if(!empty($request->cari)){
            $data_siswa = $data_siswa->where('siswa1.nama','like',"%".$cari."%");
            $total = $total->where('siswa1.nama','like',"%".$cari."%");
        }
        if($request->id_kelas != ''){
            $data_siswa = $data_siswa->where('siswa1.kelas',$request->id_kelas);    
            $total = $total->where('siswa1.kelas',$request->id_kelas);    
        }
        if($request->id_jurusan != ''){
            $data_siswa = $data_siswa->where('siswa1.jurusan',$request->id_jurusan);    
            $total = $total->where('siswa1.jurusan',$request->id_jurusan);    
        }
        if($request->id_kelas_meta != ''){
            $data_siswa = $data_siswa->where('siswa1.angka',$request->id_kelas_meta);    
            $total = $total->where('siswa1.angka',$request->id_kelas_meta);    
        }

        if($request->tanggalAwal != ''){
            $data_siswa = $data_siswa->whereDate('transaksi.created_at','>=',$request->tanggalAwal);
            $total = $total->whereDate('transaksi.created_at','>=',$request->tanggalAwal);
        }else{
            $data_siswa = $data_siswa->whereDate('transaksi.created_at','>=',date('Y-m-d',strtotime('-1 Week'))); 
            $total = $total->whereDate('transaksi.created_at','>=',date('Y-m-d',strtotime('-1 Week'))); 
        }

        if($request->tanggalAkhir != ''){
            $data_siswa = $data_siswa->whereDate('transaksi.created_at','<=',$request->tanggalAkhir);
            $total = $total->whereDate('transaksi.created_at','<=',$request->tanggalAkhir);
        } 
        else{
            $data_siswa = $data_siswa->whereDate('transaksi.created_at','<=',date('Y-m-d'));    
            $total = $total->whereDate('transaksi.created_at','<=',date('Y-m-d'));    
        }

        $data_siswa = $data_siswa->paginate(5);
        $total = $total->sum('nominal');
        $kelas = \App\Kelas::all();
        $jurusan = \App\Jurusan::all();
        $kelasmeta = \App\KelasMeta::all();
        return view('admin.jurnalumum.index', ['data_siswa' => $data_siswa->appends(['cari' => $request->cari,'tanggalAwal' => $request->tanggalAwal,'tanggalAkhir' => $request->tanggalAkhir,
        'id_Kelas' => $request->id_kelas,  'id_jurusan' => $request->id_jurusan, 'id_kelas_meta' => $request->id_kelas_meta]),
        'kelas' => $kelas, 'jurusan' => $jurusan, 'kelasmeta' => $kelasmeta,'input' => $request, 'total' => $total]);
        // echo json_encode($data_siswa);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cetak_pdflaporan(Request $request)
    {
        $cari = $request->cari;
        $data_siswa = DB::table('transaksi')
        ->select('transaksi.*','siswa1.nama','siswa1.nis','kelas1.nama_kelas')
        ->join('siswa1','siswa1.id','=','transaksi.id_siswa')
        ->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka');

        $total = DB::table('transaksi')
        ->select('transaksi.*','siswa1.nama','siswa1.nis','kelas1.nama_kelas')
        ->join('siswa1','siswa1.id','=','transaksi.id_siswa')
        ->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka');

        if(!empty($request->cari)){
            $data_siswa = $data_siswa->where('siswa1.nama','like',"%".$cari."%");
            $total = $total->where('siswa1.nama','like',"%".$cari."%");
        }
        if($request->id_kelas != ''){
            $data_siswa = $data_siswa->where('siswa1.kelas',$request->id_kelas);    
            $total = $total->where('siswa1.kelas',$request->id_kelas);    
        }
        if($request->id_jurusan != ''){
            $data_siswa = $data_siswa->where('siswa1.jurusan',$request->id_jurusan);    
            $total = $total->where('siswa1.jurusan',$request->id_jurusan);    
        }
        if($request->id_kelas_meta != ''){
            $data_siswa = $data_siswa->where('siswa1.angka',$request->id_kelas_meta);    
            $total = $total->where('siswa1.angka',$request->id_kelas_meta);    
        }

        if($request->tanggalAwal != ''){
            $data_siswa = $data_siswa->whereDate('transaksi.created_at','>=',$request->tanggalAwal);
            $total = $total->whereDate('transaksi.created_at','>=',$request->tanggalAwal);
        }else{
            $data_siswa = $data_siswa->whereDate('transaksi.created_at','>=',date('Y-m-d',strtotime('-1 Week'))); 
            $total = $total->whereDate('transaksi.created_at','>=',date('Y-m-d',strtotime('-1 Week'))); 
        }

        if($request->tanggalAkhir != ''){
            $data_siswa = $data_siswa->whereDate('transaksi.created_at','<=',$request->tanggalAkhir);
            $total = $total->whereDate('transaksi.created_at','<=',$request->tanggalAkhir);
        } 
        else{
            $data_siswa = $data_siswa->whereDate('transaksi.created_at','<=',date('Y-m-d'));    
            $total = $total->whereDate('transaksi.created_at','<=',date('Y-m-d'));    
        }

        $data_siswa = $data_siswa->get();
        $total = $total->sum('nominal');
        $kelas = \App\Kelas::all();
        $jurusan = \App\Jurusan::all();
        $kelasmeta = \App\KelasMeta::all();

    	$pdf = PDF::loadview('admin.jurnalumum.file', ['data_siswa' => $data_siswa, 'total' => $total])->setPaper('A4', 'potrait');
    	return $pdf->stream('jurnalumum.pdf');
    }
    
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
}
