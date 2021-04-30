<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College_Course;
use DB;

class College_CourseController extends Controller
{
    function college_courseadd(Request $req)
    {
        $college_course= new College_Course;
        $college_course->cr_id = $req->input('cr_id');
        $college_course->col_id = $req->input('col_id');
        $college_course->course_id = $req->input('course_id');
        $college_course->fees = $req->input('fees');
        $college_course->mode= $req->input('mode');
        $college_course->placement= $req->input('placement');
        $college_course->save();
        return $college_course;
    }
    //delete
    function delete($cr_id){
         
        $res= college_course::where('cr_id',$cr_id)->delete();
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
         
        $res= College_Course::all();
        if(!($res->isEmpty()))
        {
           return $res;
        }
        else{
           return["result"=>" not found"];
        }
    }
    //update
    function update(Request $req,$cr_id){
        
       
        $UpdateDetails= DB::update('update college_course set fees = ?,mode = ?,placement = ? where cr_id  = ?',
        [$req->input('fees'),
        $req->input('mode'),
        $req->input('placement'),
        $cr_id]);
        if($UpdateDetails)
        {
           return College_Course::all();
        }
        else{
           return["result"=>"College_course not updated"];
        }
    }
}
