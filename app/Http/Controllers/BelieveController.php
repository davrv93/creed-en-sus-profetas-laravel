<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;

class BelieveController extends Controller
{
    public function index(Request $request){
        $book = $request->book?$request->book:'';
        $code_iso = $request->code_iso?$request->code_iso:'';

        $return = array();
        $data = \DB::select("SELECT bbl.* from 
            believe_book bb 
            inner join believe_book_language bbl on bb.id =bbl.book_id 
            inner join believe_language bl on bl.id =bbl.language_id 
            where upper(bl.code_iso) = upper(IFNULL('$code_iso' ,bl.code_iso))
            AND bb.book_order = IFNULL('$book',bb.book_order)
            "
        );
        $return['results']=$data;
        return  \Response::json($return, 201); // Status code here
    }

    public function reading(Request $request){
        $start_date = $request->start_date?$request->start_date:'';
        if(str_contains(strval($start_date),'--')){
            $start_date = str_replace('--','-10-',$start_date);
        }
        $return = array();
        $data = \DB::select("SELECT br.* , 
        bb.book_order as book
         FROM
         bhp.bible_read br 
         inner join bhp.believe_book bb on bb.id=br.book_id
         where 
         start_date = '$start_date' "
        );
        $return=$data;
        return  \Response::json($return, 201); // Status code here

        
    }
}