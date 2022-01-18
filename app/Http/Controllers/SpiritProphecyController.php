<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;

class SpiritProphecyController extends Controller
{
    public function index(Request $request){
       

      
        $return=[
            [
                "archivo"=>'http://198.199.78.59/files/lectura.pdf'
            ]
        ];
        return  \Response::json($return,
             201); 
    }
}