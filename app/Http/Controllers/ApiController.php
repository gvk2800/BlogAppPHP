<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function connects(Request $r)
    {
        try{
            if($r->api_key=="12345678"){
                $connection_id=Str::random(10);
                $s=DB::table('authentication')->insert(['connection_id'=>$connection_id,'created_at'=>Date('Y-m-d H:i:s'),'updated_at'=>Date('Y-m-d H:i:s')]);
                return response()->json(['status'=>'Success','message'=>'Valid Connection ID','error'=>10001]);
        }
        else{
            return response()->json(['status'=>'error','message'=>'Invalid Connection ID','error'=>1000]);
        }
        }
        catch(\Exception $e){
            return response()->json(['status'=>'error','message'=>'Invalid Connection ID','error'=>900]);
        }
        

    }
}
