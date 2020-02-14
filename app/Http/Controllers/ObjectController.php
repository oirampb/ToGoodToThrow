<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objects;

class ObjectController extends Controller
{
    public function findObjects(Request $req){
        $response = array('error_code' => 400, 'error_msg' => 'Error inserting info');
        if(!empty($req)){
            $object = Objects::where('');
        }
        return response() -> json($response);
    }
}
