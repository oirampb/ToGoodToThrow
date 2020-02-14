<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;

class MaterialController extends Controller
{
    public function findByName(Request $req){
        $response = array('error_code' => 400, 'error_msg' => '');
        if(!empty($req)){
            $object = Material::where('name', $req->name)->first(['id']);
            if(!empty($req)){
                return 1;
                return redirect()->action('ObjectController@findByMaterial',['id' => $object]);
            }
        }

        return redirect()->action('ObjectToReuseController@findByName',['Request' => $req]);
    }
}
