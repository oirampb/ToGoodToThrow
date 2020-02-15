<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ObjectToReuse;

class ObjectToReuseController extends Controller
{
    public function findAll(){
        $response = array('error_code' => 400, 'error_msg' => '');
        $response = ObjectToReuse::all(['id', 'name','material_id']);
        return response()->json($response);
    }

    public function findById($id){
        $response = array('error_code' => 400, 'error_msg' => '');
        $response = ObjectToReuse::find($id)->get(['id', 'name']);
        return response()->json($response);
    }
}
