<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coment extends Model
{
    //
    public static function retrievecoment($idpost){
    $query = DB::table('coment')
    ->where('idpost',$idpost)
    ->get();
    return $query;
    }
    public static function tambahcoment($data){
    $query = DB::table('coment')->insert($data);
    return $query;
    }
    public static function editcoment($idcoment,$data){
    $query = DB::table('coment')
    ->where('idcoment',$idcoment)
    ->update($data);
    return $query;
    }
}
