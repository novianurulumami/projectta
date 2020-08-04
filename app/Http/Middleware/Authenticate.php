<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
            return route('logout');
            return Route('dashboard');
            return Route('tambahdatasiswa');
            return Route('datasiswa');
            return Route('laporanharian');
            return Route('laporanseluruh');
            return Route('laporan');
            return Route('jurnalumum');
            return Route('keterampilan');
            return Route('keluar');
            return Route('datakelas');
            return Route('import');
            return Route('export');
            return Route('setoran');
            return Route('detailtransaksisiswa');
            return Route('penarikan');
            return Route('cetak');
            return Route('restore');
            return Route('backup');
            return Route('penarikancetak');
        }
    }
}
