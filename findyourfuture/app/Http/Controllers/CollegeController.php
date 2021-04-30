<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collegerating;
use App\Models\Colleges;
use App\Models\College_Course;
use App\Models\Col_Img;
use DB;

class CollegeController extends Controller
{
    //College rating
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

//Colleges

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
    //file
   /* $req->validate([
       'file' => 'required|file|mimes:jpg,jpeg,bpm,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip'
    ]);*/
    
   //$colleges->infrastructure=$req->file('infrastructure')->store('apiDocs');
    $colleges->infrastructure= $req->input('infrastructure');
    $colleges->placement= $req->input('placement');
    $colleges->average= $req->input('average');
    $colleges->affiliated_to= $req->input('affiliated_to');
    //file
    $colleges->certificate=$req->file('certificate')->store('apiDocs');
   // $colleges->certificate= $req->input('certificate');
    $colleges->college_status= $req->input('college_status');
    $colleges->cpassword= $req->input('cpassword');
    $colleges->save();
    return $colleges;

   }

    function deleteclg($col_id){   //delete 
         
      $res= Colleges::where('col_id',$col_id)->delete();
      if($res)
      {
         return["result"=>" colleges  deleted successfully"];
      }
      else{
         return["result"=>"not deleted"];
      }
  }


function showclg(){ //show 
         
   $res= Colleges::all();
   if(!($res->isEmpty()))
   {
      return $res;
   }
   else{
      return["result"=>" not found"];
   }
}

//update
function updateclg(Request $req,$col_id){ //update change to updates
        
       
   $UpdateDetails= DB::update('update colleges set c_name= ?,clocation= ?,caddress = ?,cno1= ?,cno2 = ?,cemail_id = ?,About = ?,academic = ?,accommodation = ?,faculty = ?,infrastructure = ?,placement = ?,average = ?,affiliated_to = ?,certificate = ?,college_status = ?,cpassword = ? where col_id = ?',
   [$req->input('c_name'),
     $req->input('clocation'),
     $req->input('caddress'),
     $req->input('cno1'),
     $req->input('cno2'),
     $req->input('cemail_id'),
     $req->input('About'),
     $req->input('academic'),
     $req->input('accommodation'),
     $req->input('faculty'),
     $req->input('infrastructure'),
     $req->input('placement'),
     $req->input('average'),
     $req->input('affiliated_to'),
     $req->file('certificate')->store('apiDocs'),
     $req->input('college_status'),
     $req->input('cpassword'),
     $col_id]);
   if($UpdateDetails)
   {
      return Colleges::all();
   }
   else{
      return["result"=>"colleges not updated"];
   }
}

//College course

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
    function deleteclgcourse($cr_id){ 
         
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
    function showclgcourse(){ 
         
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

    function updateclgcourse(Request $req,$cr_id){ //update
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

//college image


    function col_imgadd(Request $req)
    {
        $col_img= new Col_Img;
        $col_img->image= $req->file('image')->store('apiDocs');
        $col_img->save();
        return $col_img;
    }

    function deleteimg($ccid){ //delete
         
        $res= Col_Img::where('ccid',$ccid)->delete();
        if($res)
        {
           return["result"=>" col_img deleted successfully"];
        }
        else{
           return["result"=>"not deleted"];
        }
    }

    function showimg(){ //show
         
        $res= Col_Img::all();
        if(!($res->isEmpty()))
        {
           return $res;
        }
        else{
           return["result"=>" not found"];
        }
    }
    /*function update(Request $req,$ccid ){
      $UpdateDetails= DB::update('update col_img set image= ? where ccid = ?',
      [$req->input('image'),
      $ccid]);
      if($UpdateDetails)
      {
         return Col_Img::all();
      }
      else{
         return["result"=>"col_img not updated"];
      }
  }*/
  function updateimg(Request $req,$ccid ){ //update
   $UpdateDetails= DB::update('update col_img set image = ? where ccid = ?',
   [$req->file('image')->store('apiDocs'),
   $ccid]);
   if($UpdateDetails)
   {
      return Col_Img::all();
   }
   else{
      return["result"=>"col_img not updated"];
   }
}
 
}
