<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;

class SpiritProphecyController extends Controller
{
    public function index(Request $request){
        $code_iso = $request->code_iso?$request->code_iso:'';
        $date = $request->date?$request->date:'';

        $return = array();
        $data = \DB::select("SELECT bspv.* ,
            bspl.name as book,
            bspc.chapter ,
            bspcl.name  as chapter_name
            from believe_spirit_prophecy_verse bspv 
            inner join believe_spirit_prophecy_chapter bspc on bspc.id =bspv.spirit_prophecy_chapter_id 
            inner join believe_spirit_prophecy bsp on bsp.id=bspc.spirit_prophecy_id 
            inner join believe_spirit_prophecy_lang bspl on bspl.spirit_prophecy_id =bsp.id 
            inner join believe_spirit_pr_chapter_lang bspcl on bspcl.spirit_prophecy_chapter_id =bspc.id and bspcl.language_id = bspl.language_id 
            inner join believe_language bl on bl.id =bspl.language_id 
            where upper(bl.code_iso) = upper(IFNULL('$code_iso' ,bl.code_iso))
            and  DATE('$date') BETWEEN bspc.start_date AND bspc.end_date 
            order by verse"
        );

        foreach($data as &$item){
            $book = $item->book;
            $chapter_name =$item->chapter_name;
            $chapter =$item->chapter;
            $return['book'] = $book;
            $return['chapter'] = $chapter;
            $return['chapter_name'] = $chapter_name;
        }



      
        $return=[
            [
                "archivo"=>'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            ]
        ];
        return  \Response::json($return,
             201); 
    }
}