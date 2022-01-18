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



      
        $return['results']=[
            [
                "archivo"=>'http://198.199.78.59:9000/media/SC%20cap%201a%20Primera%20semana%2016%20enero%202022.pdf?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=18IK434ZR5LHPYRAMTAW%2F20220118%2Fus-east-1%2Fs3%2Faws4_request&X-Amz-Date=20220118T171148Z&X-Amz-Expires=604800&X-Amz-Security-Token=eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJhY2Nlc3NLZXkiOiIxOElLNDM0WlI1TEhQWVJBTVRBVyIsImV4cCI6MTY0MjUyOTQ4MywicGFyZW50IjoiQUtJQUlPU0ZPRE5ON0VYQU1QTEUifQ.wP3c270SyIq6KTWJfZqsRNglNN9SmeDevCzRiBRYhVf0oP5HW9_jmQWb5ALBPiXYoRRFm1OhRz1WXGShJYyWYw&X-Amz-SignedHeaders=host&versionId=null&X-Amz-Signature=9d64496f215aa8d3082d1a86f83846a494724d2136dc26950354b80235269dc0'
            ]
        ];
        return  \Response::json(array(
            "data"=>$return),
             201); 
    }
}