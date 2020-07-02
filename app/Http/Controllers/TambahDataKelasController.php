<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TambahDataKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data_siswa = \App\Siswa::join('kelas1','kelas1.id_kelas','=','siswa1.kelas')
        ->join('jurusan','jurusan.id_jurusan','=','siswa1.jurusan')
        ->join('kelas_meta','kelas_meta.id_kelas_meta','=','siswa1.angka')
        ->get();
        $data_kelas = \App\Kelas::all();
        $data_jurusan = \App\Jurusan::all();
        $data_kelasmeta = \App\KelasMeta::all();
        return view('admin.datasiswa.addkelas', ['data_kelas' => $data_kelas, 'data_jurusan' => $data_jurusan, 'data_kelasmeta' => $data_kelasmeta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        \App\Jurusan::create($request->all());
        return redirect('tambahjurusan')->with('sukses', 'Data Berhasil Diinput');
    }

    public function create1(Request $request)
    {
        
        \App\KelasMeta::create($request->all());
        return redirect('tambahjurusan')->with('sukses', 'Data Berhasil Diinput');
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
