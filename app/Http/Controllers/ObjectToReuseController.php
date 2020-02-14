<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ObjectToReuse;

class ObjectToReuseController extends Controller
{
    public function findByName(Request $req){
        $response = array('error_code' => 400, 'error_msg' => 'Error inserting info');
        if(!empty($req)){
            $object = ObjectToReuse::where('name', $req)->get();
        }

        return response() -> json($response);
    }
}
