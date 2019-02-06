<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;

class postCtrl extends Controller
{
    //
    public function posting(Request $request){
        $input = $request->all();
        $response = post::tambahpost($input);
        return Response::json($response);
    }
    public function lihatposting(Request $request,$idpost){
       $model =  post::findpost($idpost);
       return Response::json($model);
    }
}
