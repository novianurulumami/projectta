<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    //
    function loginAndroid(Request $request){

        $result = array();

        $logins = DB::table('siswa1')
        ->where('nis', $request->input('nis'))
        ->first();

        if($logins != null){

            $result = array("data"=>$logins);
           
            echo json_encode($result);
        }else{
            $result = array("data"=>$logins);
            echo json_encode($result);
        }
        
    }
}
