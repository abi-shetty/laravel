<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Jobtype;
use App\Models\Courses;
use App\Models\Colleges;
class AdminController extends Controller
{
    //JOB_TYPE
    
    function jobcreate(Request $req)
    {
        $jobtype= new Jobtype;
        $jobtype->job_type= $req->input('job_type');
        $jobtype->save();
        return $jobtype;

    }
     function jobdelete($jt_id){
         
         $res= jobtype::where('jt_id',$jt_id)->delete();
         if($res)
         {
            return["result"=>"Job type deleted"];
         }
         else{
            return["result"=>"Job type not deleted"];
         }
     }
     function jobshow(){
         
        $res= jobtype::all();
        if(!($res->isEmpty()))
        {
           return $res;
        }
        else{
           return["result"=>"Job type not found"];
        }
    }

    public function jobdisplay($jt_id){
         
      $res= jobtype::where('jt_id', '=', $jt_id)->first();
      if($res)
      {
         return $res;
      }
      else{
         return["result"=>"Problem while getting data from main function"];
      }
  }

    function jobupdate(Request $req,$jt_id){
        $UpdateDetails= DB::update('update jobtype set job_type = ? where jt_id = ?',[$req->input('job_type'),$jt_id]);
        if($UpdateDetails)
        {
           return $this->jobdisplay($jt_id);
        }
        else{
           return["result"=>"Job type not updated"];
        }
    }

    //COURSE ADD
    public function index()
    {
        //
    }

    
    public function course_create(Request $req)
    {
        $courses= new Courses;
        $courses->course= $req->input('course');
        $courses->stream= $req->input('stream');
        $courses->after= $req->input('duration');//->get('after');
        $courses->duration= $req->input('duration');
        $courses->type= $req->input('type');//stopppppppp
        $courses->about= $req->input('about');
        $courses->exam_type= $req->input('exam_type');
        $courses->eligibility= $req->input('duration');//miss
        $courses->recruitment= $req->input('duration');
        $courses->jobs= $req->input('duration');
        $courses->fees= $req->input('duration');
        $courses->save();
        return $courses;
        /*return [$req->input('course'),$req->input('stream'),$req->input('after'),$req->input('duration'),
        $req->input('type'),$req->input('about'),$req->input('exam_type'),$req->input('eligibility'),$req->input('recruitment'),
        $req->input('jobs'),$req->input('fees')];*/
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

    //college add
      function collegeadd(Request $req)
      {
         $colleges= new Colleges;
         $colleges->c_name= $req->input('c_name');
         $colleges->clocation= $req->input('clocation');
         $colleges->caddress= $req->input('caddress');
         $colleges->cno1= $req->input('cno1');
         $colleges->cno2= $req->input('cno2');
         $colleges->cemail_id= $req->input('cemail_id');
         $colleges->About= $req->input('About');
         $colleges->academic= $req->input('academic');
         $colleges->accommodation= $req->input('accommodation');
         $colleges->faculty= $req->input('faculty');
         $colleges->infrastructure= $req->input('infrastructure');
         $colleges->placement= $req->input('placement');
         $colleges->average= $req->input('average');
         $colleges->affiliated_to= $req->input('affiliated_to');
         $colleges->certificate=$req->file('certificate')->store('apiDocs');
         $colleges->cpassword= $req->input('cpassword');
         $colleges->save();
      }

}
