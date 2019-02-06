<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\post;

class userCtrl extends Controller
{
    //
    public function getuser(){
    $model = Users::find();
    return response()->json($model);
    }

    public function registeruser(request $request){
        $email =  Input::get('email');
        $password = Input::get('password');
        $username = Input::get('username');
        $data = array([
        'email'=> $email,
        'password' => password_hash($password,PASSWORD_BCRYPT),
        'username' =>$username
        ]);
        $model = Users::registerusers($data);
        return Response::json("succes",200);
    }

    public function profiluser(request $request,$iduser){
        $model = Users::profil($id);
        return response()->json($model);
    }

    public function halamanuser(request $request,$iduser){
        $model = post::userpost($iduser);
        return response()->json($model);
    }
}
