<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;

class ChapterController extends Controller
{
    public function index(Request $request){
        $book = $request->book?$request->book:'';
        $code_iso = $request->code_iso?$request->code_iso:'';
        $chapter = $request->chapter?$request->chapter:'';

        $return = array();
        $data = \DB::select("select bbl.* from 
        believe_book bb 
        inner join believe_book_language bbl on bb.id =bbl.book_id 
        inner join believe_chapter bc  on bb.id =bc.book_id 
        inner join believe_language bl on bl.id =bbl.language_id 
        where upper(bl.code_iso) = upper(IFNULL('$code_iso' ,bl.code_iso)) and
        bb.book_order = IFNULL('$book',bb.book_order) and bc.chapter = IFNULL('$chapter',bc.chapter)
            "
        );
        $return['results']=$data;
        return  \Response::json($return, 201); // Status code here
    }
}