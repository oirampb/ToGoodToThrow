<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ObjectToReuse;

class ObjectToReuseController extends Controller
{
    public function findByName(Request $req){
        $response = array('error_code' => 400, 'error_msg' => '');
        if(!empty($req)){
            $object = ObjectToReuse::where('name', $req->name)->first(['id']);
            if(!empty($req)){
                return redirect()->action('ObjectController@findByObjects',['id' => $object]);
            }
        }

        return response() -> json($response);
    }
}
