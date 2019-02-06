<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class post extends Model
{
    public static function find(){
        $query = DB::table('post')->get();
        return $query;
    }
    Public static function tambahpost($data){
        $query = DB::table('post')->insert($data);
        return $query;
    }
    Public static function editpost($id,$data){
        $query = DB::table('post')
        ->where('idpost',$id)
        ->update($data);
        return $query;
    }
    public static function findpost($id){
        $query = DB::table('post')
        ->where('idpost',$id)
        ->first();
        return $query;
    }
    public static function userpost($id){
        $query = DB::table('post')
        ->where('iduser',$id)
        ->get();
    }
}
