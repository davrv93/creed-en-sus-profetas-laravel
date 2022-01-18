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
                "archivo"=>'http://198.199.78.59:9000/media/sc1a.pdf?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=18IK434ZR5LHPYRAMTAW%2F20220118%2Fus-east-1%2Fs3%2Faws4_request&X-Amz-Date=20220118T172518Z&X-Amz-Expires=604800&X-Amz-Security-Token=eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJhY2Nlc3NLZXkiOiIxOElLNDM0WlI1TEhQWVJBTVRBVyIsImV4cCI6MTY0MjUyOTQ4MywicGFyZW50IjoiQUtJQUlPU0ZPRE5ON0VYQU1QTEUifQ.wP3c270SyIq6KTWJfZqsRNglNN9SmeDevCzRiBRYhVf0oP5HW9_jmQWb5ALBPiXYoRRFm1OhRz1WXGShJYyWYw&X-Amz-SignedHeaders=host&versionId=null&X-Amz-Signature=5f279c29231beaad4260d747f154089915b5736c0d5f3f819a4b07fa0e56a175'
            ]
        ];
        return  \Response::json($return,
             201); 
    }
}