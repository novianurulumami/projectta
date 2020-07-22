<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Siswa;
use App\Kelas;
use App\KelasMeta;
use App\TahunAngkatan;
use App\Transaksi;
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
		$kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $kelasmeta = KelasMeta::all();
        $transaksi = Transaksi::all();
        // $data_siswa = '';
        // $saldo = '';

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
        $setoran = DB::table('transaksi');
        $penarikan = Transaksi::where('status_transaksi','Penarikan');

        return view('admin.datasiswa.index', ['data_siswa' => $data_siswa->appends(['cari' => $request->cari]),
         'kelas' => $kelas, 
         'input' => $request,
         'jurusan' => $jurusan, 
         'setoran' => $setoran,
         'penarikan' => $penarikan,
         'kelasmeta' => $kelasmeta]);
        

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
        return view('admin.datasiswa.detailsaldo', ['data_tahun' => $data_tahun], ['datasiswa' => $datasiswa], ['kelas' => $kelas], ['jurusan' => $jurusan], ['kelasmeta' => $kelasmeta]);

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
    
    // public function datatables()
    // {
    //     //
    //     $query = Product::select('id', 'nama', 'kelas', 'jurusan', 'angka', 'no_rekening')->orderBy('id');
    //     if (request('angka')) {
    //         $filter_periode = now()->subDays(request('angka'))->toDateString();
    //         $query->where('created_at', '>=', $angka);
    //     }

    //     return datatables($query)->toJson();
    // }
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
