<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course_Apply;
use DB;

class Course_ApplyController extends Controller
{
    
    function course_applyadd(Request $req)
    {
        $course_apply= new Course_Apply;
        $course_apply->city= $req->input('city');
        $course_apply->psession= $req->input('psession');
        $course_apply->mode= $req->input('mode');
        $course_apply->cstatus= $req->input('cstatus');
       // $job_apply->do_apply= $req->input('do_apply');
        $course_apply->save();
        return $course_apply;

    }
    function delete($capply_id){
         
        $res= Course_Apply::where('capply_id',$capply_id)->delete();
        if($res)
        {
           return["result"=>" course apply deleted successfully"];
        }
        else{
           return["result"=>"not deleted"];
        }
    }

    function show(){
         
        $res= Course_Apply::all();
        if(!($res->isEmpty()))
        {
           return $res;
        }
        else{
           return["result"=>" not found"];
        }
    }


    function update(Request $req,$capply_id ){
        $UpdateDetails= DB::update('update course_apply set city = ?,psession= ?,mode= ?,cstatus= ? where capply_id = ?',
        [$req->input('city'),
        $req->input('psession'),
        $req->input('mode'),
        $req->input('cstatus'),
        $capply_id]);
        if($UpdateDetails)
        {
           return Course_Apply::all();
        }
        else{
           return["result"=>"course_apply not updated"];
        }
    }
}
