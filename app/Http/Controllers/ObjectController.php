<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objects;
use App\ObjectToReuse;
use App\Material;
use Illuminate\Support\Facades\Input;

class ObjectController extends Controller
{
    public function findByObjects($id){
        $response = array('error_code' => 400, 'error_msg' => 'Error inserting info');
        $response = Objects::where('object_to_reuses_id', $id)->get();
        return response() -> json($response);
    }

    public function findByMaterial($id){
        $response = array('error_code' => 400, 'error_msg' => 'Error inserting info');
        $response = Objects::where('material_id', $id)->get();
        return response() -> json($response);
    }

    public function findForAll(Request $req){
        $response = array('error_code' => 400, 'error_msg' => 'Error inserting info');
        if(!empty($req->name)){
            $object_id = Material::where('name', $req->name)->first(['id']);
            if(!empty($object_id)){
                $object = Objects::where('material_id', $object_id->id)->get(['id','name','material_id','object_to_reuses_id','img','link_video','tools','explain','skill']);
                return response() -> json($object);
            }
            else{
                $object_id = ObjectToReuse::where('name', $req->name)->first(['id']);
                if(!empty($object_id)){
                    $object = Objects::where('object_to_reuses_id', $object_id->id)->get(['id','name','material_id','object_to_reuses_id','img','link_video','tools','explain','skill']);
                    return response() -> json($object);
                }else{
                    $object = Objects::where('name', $req->name)->get(['id','name','material_id','object_to_reuses_id','img','link_video','tools','explain','skill']);
                    if(!empty($object)){
                        return response() -> json($object);
                    }
                }
            }
        }
        return response() -> json($response);
    }

    public function listAllObjects(){
        $teachers = Objects::all();
        if(empty($teachers)){
            $teachers = array('error_code' => 400, 'error_msg' => 'No hay profesores encontrados');
        }else{
            return response()->json($teachers);
        }
    }
}
