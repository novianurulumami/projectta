<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use Illuminate\Support\Facades\DB;

class LaporanHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $cari = $request->cari;
        $data_siswa = DB::table('transaksi')
        ->select('transaksi.*','siswa1.nama','siswa1.nis','kelas1.nama_kelas')
        ->join('siswa1','siswa1.id','=','transaksi.id_siswa')
        ->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka');

       $setoran = DB::table('transaksi')
        ->join('siswa1','siswa1.id','=','transaksi.id_siswa')
        ->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka');

        $penarikan = DB::table('transaksi')
        ->join('siswa1','siswa1.id','=','transaksi.id_siswa')
        ->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka');

        $saldoawal = DB::table('transaksi')
        ->join('siswa1','siswa1.id','=','transaksi.id_siswa')
        ->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka');

        if(!empty($request->cari)){
            $data_siswa = $data_siswa->where('siswa1.nama','like',"%".$cari."%");
           $setoran =$setoran->where('siswa1.nama','like',"%".$cari."%");
           $penarikan =$penarikan->where('siswa1.nama','like',"%".$cari."%");
           $saldoawal =$saldoawal->where('siswa1.nama','like',"%".$cari."%");
        }
        if($request->id_kelas != ''){
            $data_siswa = $data_siswa->where('siswa1.kelas',$request->id_kelas);   
           $setoran =$setoran->where('siswa1.kelas',$request->id_kelas);
           $penarikan =$penarikan->where('siswa1.kelas',$request->id_kelas);
           $saldoawal =$saldoawal->where('siswa1.kelas',$request->id_kelas);
        }
        if($request->id_jurusan != ''){
            $data_siswa = $data_siswa->where('siswa1.jurusan',$request->id_jurusan);
           $setoran =$setoran->where('siswa1.jurusan',$request->id_jurusan);    
           $penarikan =$penarikan->where('siswa1.jurusan',$request->id_jurusan);    
           $saldoawal =$saldoawal->where('siswa1.jurusan',$request->id_jurusan);    
        }
        if($request->id_kelas_meta != ''){
            $data_siswa = $data_siswa->where('siswa1.angka',$request->id_kelas_meta); 
           $setoran =$setoran->where('siswa1.angka',$request->id_kelas_meta);       
           $penarikan =$penarikan->where('siswa1.angka',$request->id_kelas_meta);       
           $saldoawal =$saldoawal->where('siswa1.angka',$request->id_kelas_meta);       
        }

        if($request->tanggalAwal != ''){
            $data_siswa = $data_siswa->whereDate('transaksi.created_at','>=',$request->tanggalAwal);
           $setoran =$setoran->whereDate('transaksi.created_at','>=',$request->tanggalAwal);
           $penarikan =$penarikan->whereDate('transaksi.created_at','>=',$request->tanggalAwal);
           $saldoawal =$saldoawal->whereDate('transaksi.created_at','>=',$request->tanggalAwal);
        }else{
            $data_siswa = $data_siswa->whereDate('transaksi.created_at','>=',date('Y-m-d',strtotime('-1 Week'))); 
           $setoran =$setoran->whereDate('transaksi.created_at','>=',date('Y-m-d',strtotime('-1 Week')));
           $penarikan =$penarikan->whereDate('transaksi.created_at','>=',date('Y-m-d',strtotime('-1 Week')));
           $saldoawal =$saldoawal->whereDate('transaksi.created_at','>=',date('Y-m-d',strtotime('-1 Week')));
        }

        if($request->tanggalAkhir != ''){
            $data_siswa = $data_siswa->whereDate('transaksi.created_at','<=',$request->tanggalAkhir);
           $setoran =$setoran->whereDate('transaksi.created_at','<=',$request->tanggalAkhir);
           $penarikan =$penarikan->whereDate('transaksi.created_at','<=',$request->tanggalAkhir);
           $penarikan =$penarikan->whereDate('transaksi.created_at','<=',$request->tanggalAkhir);
        } 
        else{
            $data_siswa = $data_siswa->whereDate('transaksi.created_at','<=',date('Y-m-d'));    
           $setoran =$setoran->whereDate('transaksi.created_at','<=',date('Y-m-d')); 
           $penarikan =$penarikan->whereDate('transaksi.created_at','<=',date('Y-m-d')); 
           $saldoawal =$saldoawal->whereDate('transaksi.created_at','<=',date('Y-m-d')); 
        }


        $data_siswa = $data_siswa->paginate(10);
        $setoran =$setoran->where('status_transaksi','Setoran')->sum('nominal');
        $penarikan =$penarikan->where('status_transaksi','Penarikan')->sum('nominal');
        $saldoawal =$saldoawal->where('status_transaksi','Saldo Awal')->sum('nominal');
        $saldoakhir = $setoran - $penarikan + $saldoawal;

        $kelas = \App\Kelas::all();
        $jurusan = \App\Jurusan::all();
        $kelasmeta = \App\KelasMeta::all();
        return view('admin.laporanharian.index', ['data_siswa' => $data_siswa->appends(['cari' => $request->cari,'tanggalAwal' => $request->tanggalAwal,'tanggalAkhir' => $request->tanggalAkhir,
        'id_Kelas' => $request->id_kelas,  'id_jurusan' => $request->id_jurusan, 'id_kelas_meta' => $request->id_kelas_meta]),
        'kelas' => $kelas, 'jurusan' => $jurusan, 'kelasmeta' => $kelasmeta,'input' => $request,
        'setoran' => $setoran, 'penarikan' => $penarikan, 'saldoawal' => $saldoawal, 'saldoakhir' => $saldoakhir]);
        // echo json_encode($data_siswa);
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
