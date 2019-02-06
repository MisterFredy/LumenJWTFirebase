<?php

namespace App;

//use Illuminate\Auth\Authenticatable;
//use Laravel\Lumen\Auth\Authorizable;
//use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
//use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    public static function login($email){
        $query = DB::table('users')
                 ->where('email', $email)
                 ->first();
                 return $query;
    }
    public static function registerusers($data){
        $query = DB::table('users')->insert($data);
        return $query;
    }
    public static function profil($idusers){
        $query = DB::table('users')
        ->where('iduser',$idusers)
        ->first();
        return $query;
    }
    public static function updateprofile($idusers,$data){
        $query = DB::table('users')
        ->where('idusers',$idusers)
        ->update($data);
        return $query;
    }
    public static function find(){
        $query = DB::table('users')->get();
        return $query;
    }
}
