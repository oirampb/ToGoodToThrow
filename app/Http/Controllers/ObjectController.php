<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objects;
use App\ObjectToReuse;
use App\Material;
use Illuminate\Support\Facades\Input;

class ObjectController extends Controller
{
    public function findByObjects(Request $req){
        $response = array('error_code' => 400, 'error_msg' => 'Error inserting info');
        if(!empty($req)){
            $object = Objects::where('object_to_reuses_id', $req);
        }
        return response() -> json($response);
    }

    public function findByMaterial(Request $req){
        $response = array('error_code' => 400, 'error_msg' => 'Error inserting info');
        if(!empty($req)){
            $object = Objects::where('material_id', $req);
        }
        return response() -> json($response);
    }

    public function findAll(Request $req){
        $response = array('error_code' => 400, 'error_msg' => 'Error inserting info');
        if(!empty($req)){
            
            return redirect()->action('MaterialController@findByName',['name' => $req->name]);
        }
        return response() -> json($response);
    }
}
