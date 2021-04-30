<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request_Course;
use DB;


class Request_CourseController extends Controller
{
    function request_courseadd(Request $req)
    {
        $request_course= new Request_Course;
        $request_course->subject= $req->input('subject');
        $request_course->request= $req->input('request');                                                 
        $request_course->rstatus= $req->input('rstatus');
        $request_course->save();
        return $request_course;

    }
    function delete($rc_id){
         
        $res= Request_Course::where('rc_id',$rc_id)->delete();
        if($res)
        {
           return["result"=>" request_course deleted successfully"];
        }
        else{
           return["result"=>"not deleted"];
        }
    }

    function show(){
         
        $res= Request_Course::all();
        if(!($res->isEmpty()))
        {
           return $res;
        }    else{
           return["result"=>" not found"];
        }
    }


        //update
        function update(Request $req,$rc_id){
         $UpdateDetails= DB::update('update request_course set subject = ?,request = ?,rstatus = ? where rc_id = ?',
         [$req->input('subject'),
         $req->input('request'),
         $req->input('rstatus'),
         $rc_id]);
         if($UpdateDetails)
         {
            return Request_Course::all();
         }
         else{
            return["result"=>"request course not updated"];
         }
     }
    
   
}