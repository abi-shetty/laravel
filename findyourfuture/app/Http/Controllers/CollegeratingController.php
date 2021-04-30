<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collegerating;
use DB;


class CollegeratingController extends Controller
{
    function collegeratingadd(Request $req)
    {
        $collegerating= new Collegerating;
        $collegerating->r_id = $req->input('r_id');
        $collegerating->col_id= $req->input('col_id');
        $collegerating->user_id= $req->input('user_id');
        $collegerating->ACADEMIC= $req->input('ACADEMIC');
        $collegerating->ACCOMMODATION= $req->input('ACCOMMODATION');
        $collegerating->FACULTY= $req->input('FACULTY');
        $collegerating->INFRASTRUCTURE=$req->input('INFRASTRUCTURE');
        $collegerating->PLACEMENTS= $req->input('PLACEMENTS');
        $collegerating->title= $req->input('title');
        $collegerating->COMMENTS= $req->input('COMMENTS');
        $collegerating->rdate= $req->input('rdate');
        $collegerating->save();
        return $collegerating;
    }
    //delete
    function delete($r_id){
         
        $res= Collegerating::where('r_id',$r_id)->delete();
        if($res)
        {
           return["result"=>" deleted successfully"];
        }
        else{
           return["result"=>"not deleted"];
        }
    }
    //show
    function show(){
         
        $res= Collegerating::all();
        if(!($res->isEmpty()))
        {
           return $res;
        }
        else{
           return["result"=>" not found"];
        }
    }
    //update
    function update(Request $req,$r_id){
        
       
        $UpdateDetails= DB::update('update collegerating set ACADEMIC = ?,ACCOMMODATION = ?,FACULTY = ?,INFRASTRUCTURE = ?,PLACEMENTS = ?,title = ?,COMMENTS = ?,rdate = ? where r_id  = ?',
        [$req->input('ACADEMIC'),
        $req->input('ACCOMMODATION'),
        $req->input('FACULTY'),
        $req->input('INFRASTRUCTURE'),
        $req->input('PLACEMENTS'),
        $req->input('title'),
        $req->input('COMMENTS'),
        $req->input('rdate'),
        $r_id]);
        if($UpdateDetails)
        {
           return Collegerating::all();
        }
        else{
           return["result"=>"Collegerating not updated"];
        }
    }
}

