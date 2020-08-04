<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\TransaksiHarian;
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
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka')
        ->orderBy('transaksi.created_at','desc');

        $data_transaksi = DB::table('transaksi_harian')
        ->select('transaksi.*','siswa1.nama','siswa1.nis','kelas1.nama_kelas')
        ->join('siswa1','siswa1.id','=','transaksi.id_siswa')
        ->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka')
        ->orderBy('transaksi_harian.created_at','desc');

        $setoran1 = DB::table('transaksi')
        ->join('siswa1','siswa1.id','=','transaksi.id_siswa')
        ->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka');

        $penarikan1 = DB::table('transaksi')
        ->join('siswa1','siswa1.id','=','transaksi.id_siswa')
        ->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka');

       $setoran = DB::table('transaksi')
        ->join('siswa1','siswa1.id','=','transaksi.id_siswa')
        ->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka')
        ->whereDate('transaksi.created_at','>=',date('Y-m-d'));

        $penarikan = DB::table('transaksi')
        ->join('siswa1','siswa1.id','=','transaksi.id_siswa')
        ->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka')
        ->whereDate('transaksi.created_at','>=',date('Y-m-d'));

        $saldoawal = DB::table('transaksi_harian')
        ->whereDate('created_at','>=',date('Y-m-d'))
        ->get();

        $saldoawal1 = DB::table('transaksi')
        ->join('siswa1','siswa1.id','=','transaksi.id_siswa')
        ->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka');

        $saldoawal2 = DB::table('transaksi')
        ->join('siswa1','siswa1.id','=','transaksi.id_siswa')
        ->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka')
        ->whereDate('transaksi.created_at','>=',date('Y-m-d'));

        $data_siswa = $data_siswa->paginate(10);
        $setoran =$setoran->where('status_transaksi','Setoran')->sum('nominal');
        $penarikan =$penarikan->where('status_transaksi','Penarikan')->sum('nominal');
        $setoran1 =$setoran1->where('status_transaksi','Setoran')->sum('nominal');
        $penarikan1 =$penarikan1->where('status_transaksi','Penarikan')->sum('nominal');
        $saldoawal1 =$saldoawal1->where('status_transaksi','Saldo Awal')->sum('nominal');
        $saldoawal2 =$saldoawal2->where('status_transaksi','Saldo Awal')->sum('nominal');
        $saldoawal =$saldoawal->sum('saldo_harian');
        $saldoakhir = $saldoawal1 + $setoran1 - $penarikan1 - $saldoawal - $setoran + $penarikan - $saldoawal2;
        $saldoakhir1 = $saldoawal + $saldoawal2 + $setoran - $penarikan;

        $kelas = \App\Kelas::all();
        $jurusan = \App\Jurusan::all();
        $kelasmeta = \App\KelasMeta::all();
        return view('admin.laporanharian.index', ['data_siswa' => $data_siswa, 'data_transaksi' => $data_transaksi,
        'kelas' => $kelas, 'jurusan' => $jurusan, 'kelasmeta' => $kelasmeta,'input' => $request,
        'setoran' => $setoran, 'penarikan' => $penarikan, 'saldoawal' => $saldoawal, 'saldoawal1' => $saldoawal1,
        'saldoawal2' => $saldoawal2, 'saldoakhir1' => $saldoakhir1,
         'saldoakhir' => $saldoakhir, 'setoran1' => $setoran1, 'penarikan1' => $penarikan1]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        \App\TransaksiHarian::create($request->all());
        return redirect('tambahharian')->with('sukses', 'Data Berhasil Diinput');
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
