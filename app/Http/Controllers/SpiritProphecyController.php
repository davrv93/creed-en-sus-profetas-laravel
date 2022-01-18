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
                "archivo"=>'http://pastorroncal.com/filesd/lectura.pdf'
            ]
        ];
        return  \Response::json($return,
             201); 
    }
}