<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Courses;

class CoursesController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function course_create(Request $req)
    {
        $courses= new Courses;
        $courses->course= $req->input('course');
        $courses->stream= $req->input('stream');
       // $courses->after= $req->input('after');
       
        $courses->duration= $req->input('duration');
        $courses->type= $req->input('type');
        $courses->about= $req->input('about');
        $courses->exam_type= $req->input('exam_type');
        $courses->eligibility= $req->input('eligibility');
        $courses->recruitment= $req->input('recruitment');
        $courses->jobs= $req->input('jobs');
        $courses->fees= $req->input('fees');
        $courses->save();
        return $courses;
    }

    
    function course_delete($course_id){
         
        $res= Courses::where('course_id',$course_id)->delete();
        if($res)
        {
           return["result"=>"course deleted"];
        }
        else{
           return["result"=>"course not deleted"];
        }
    }

   
    public function course_show()
    {
        $res= Courses::all();
        if(!($res->isEmpty()))
        {
           return $res;
        }
        else{
           return["result"=>"Courses not found"];
        }
    }
    public function course_display($course_id)
    {
        $res= courses::where('course_id', '=', $course_id)->first();
        if($res)
        {
           return $res;
        }
        else{
           return["result"=>"Problem while getting data from main function"];
        }
    }

    
    
   
    public function course_update(Request $req, $course_id)
    {
        $UpdateDetails= DB::update('update Courses set course= ?, stream= ?, after= ?, duration= ?, type= ?, about= ?, exam_type= ?, eligibility= ?, recruitment= ?, jobs= ?, fees = ?
         where course_id = ?',
        [$req->input('course'),
        $req->input('stream'),
        $req->input('after'),
        $req->input('duration'),
        $req->input('type'),
        $req->input('about'),
        $req->input('exam_type'),
        $req->input('eligibility'),
        $req->input('recruitment'),
        $req->input('jobs'),
        $req->input('fees'),
        $course_id]);
        if($UpdateDetails)
        {
           return $this->course_display($course_id);
           
        }
        else{
           return["result"=>"course type not updated"];
        }
    }

    
    
    
}
