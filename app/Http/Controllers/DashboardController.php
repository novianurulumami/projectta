<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = \App\Siswa::all();
        $transaksi = \App\Transaksi::all();

        $categories =[];
        foreach ($transaksi as $key) {
            $categories[] = $key->status_transaksi;
        }

        $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

        $kelas = ['X','XI','XII'];

        // setoran
        $rekap = [];
        for ($i=1; $i <= 12; $i++) { 
            $setoran = \App\Transaksi::select(DB::raw('sum(nominal) as nominal,MONTH(created_at) as bulan'))
                ->whereMonth('created_at',$i)
                ->whereYear('created_at',date('Y'))
                ->where('status_transaksi','Setoran')
                ->groupBy('bulan')
                ->first();

            if($setoran == '')
            $rekap[] = 0;
            else 
                $rekap[]= (int)$setoran['nominal'];
        }

         // saldo awal
         $rekapSaldoAwal = [];
         for ($i=1; $i <= 12; $i++) { 
             $saldo = \App\Transaksi::select(DB::raw('sum(nominal) as nominal,MONTH(created_at) as bulan'))
                 ->whereMonth('created_at',$i)
                 ->whereYear('created_at',date('Y'))
                 ->where('status_transaksi','Saldo Awal')
                 ->groupBy('bulan')
                 ->first();
 
             if($saldo == '')
                $rekapSaldoAwal[] = 0;
             else 
                $rekapSaldoAwal[]= (int)$saldo['nominal'];
         }

          // penarikan
          $rekapPenarikan = [];
          for ($i=1; $i <= 12; $i++) { 
              $saldo = \App\Transaksi::select(DB::raw('sum(nominal) as nominal,MONTH(created_at) as bulan'))
                  ->whereMonth('created_at',$i)
                  ->whereYear('created_at',date('Y'))
                  ->where('status_transaksi','Penarikan')
                  ->groupBy('bulan')
                  ->first();
  
              if($saldo == '')
                $rekapPenarikan[] = 0;
              else 
                $rekapPenarikan[]= (int)$saldo['nominal'];
          }


        // dd(json_encode($categories));
        return view('admin.dashboard.index', ['siswa' => $siswa, 
        'transaksi' => $transaksi, 
        'bulan' => $bulan,
        'setoran' => $rekap,
        'penarikan' => $rekapPenarikan,
        'kelas' => $kelas,
        'saldo' => $rekapSaldoAwal
        ]);
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
