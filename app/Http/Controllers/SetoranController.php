<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Siswa;
use App\Kelas;
use App\KelasMeta;
use App\Transaksi;
use Illuminate\Support\Facades\DB;

class SetoranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datasiswa = '';
        $saldo = '';
        $setoran = '';
        $penarikan = '';

        if($request->nis != NULL){
        $datasiswa = DB::table('siswa1')->join('kelas1','kelas1.id_kelas','=','siswa1.kelas') 
            ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
            ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka')
            ->where('siswa1.nis',$request->nis)
            ->first();
            if(empty($datasiswa)){
                return redirect('setoraninput')->with('gagal', 'NIS tidak terdaftar');
                }
            $saldoawal = Transaksi::where('id_siswa',$datasiswa->id)->where('status_transaksi','Saldo Awal')->sum('nominal');
            $setoran = Transaksi::where('id_siswa',$datasiswa->id)->where('status_transaksi','Setoran')->sum('nominal');
            $penarikan = Transaksi::where('id_siswa',$datasiswa->id)->where('status_transaksi','Penarikan')->sum('nominal');
            $saldo = $saldoawal + $setoran - $penarikan;

            // masukan source code print
            
        }

        return view('admin.setoran.index', ['datasiswa' => $datasiswa, 'saldo' => $saldo, 'setoran' => $setoran, 'penarikan' => $penarikan]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.setoran.cetak');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id_siswa' => 'required|numeric',
         ]);
        $cek_transaksi = Transaksi::where('id_siswa',$request->id_siswa)->count();
        $saldoawal = Transaksi::where('id_siswa',$request->id)->where('status_transaksi','Saldo Awal')->sum('nominal');
        $setoran = Transaksi::where('id_siswa',$request->id_siswa)->where('status_transaksi','Setoran')->sum('nominal');
        $penarikan = Transaksi::where('id_siswa',$request->id_siswa)->where('status_transaksi','Penarikan')->sum('nominal');
        $saldo = $saldoawal + $setoran - $penarikan;

        if($cek_transaksi>0 && $request->status_transaksi=="Setoran")
        Transaksi::create($request->all());
        elseif($cek_transaksi>0 && $request->status_transaksi=="Penarikan")
        Transaksi::create($request->all());
        elseif($cek_transaksi==0 && $request->status_transaksi=="Setoran"){
            $data = new Transaksi;
            $data->id_siswa = $request->id_siswa;
            $data->status_transaksi = "Saldo Awal";
            $data->nominal = $request->nominal;
            $data->nama_petugas = $request->nama_petugas;
            $data->save();
        }
        elseif($cek_transaksi==0 && $request->status_transaksi=="Penarikan"){
            return redirect('setoraninput')->with('gagal', 'Belum ada saldo awal');
        }elseif($request->nominal>$saldo){
            return redirect('setoraninput')->with('gagal', 'Saldo tidak mencukupi untuk melakukan penarikan');
        }
        return redirect('setoraninput')->with('sukses', 'Data Berhasil Diinput');
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
