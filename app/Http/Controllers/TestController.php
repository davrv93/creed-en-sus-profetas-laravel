<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index(){

        $return = array();
        $data = \DB::select(
            "select * from believe_book"
        );
        $return['data']=$data;
        return  \Response::json($return, 201); // Status code here
    }
  
}