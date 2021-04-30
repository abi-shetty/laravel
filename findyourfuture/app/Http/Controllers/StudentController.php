<?php

namespace App\Http\Controllers;
use App\Models\Student;
use DB;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    function create(Request $req)
    {
        $student= new Student;
        $student->pre_institute= $req->input('pre_institute');
        $student->pre_course= $req->input('pre_course');
        $student->percentage= $req->input('percentage');
        $student->ypass= $req->input('ypass');
        $student->sreg_no= $req->input('sreg_no');
        $student->stud_status= $req->input('stud_status');
        $student->save();
        return $student;

    }

   //delete
   function delete($stud_id){
         
    $res= Student::where('stud_id',$stud_id )->delete();
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
         
        $res= Student::all();
        if(!($res->isEmpty()))
        {
           return $res;
        }
        else{
           return["result"=>"student not found"];
        }
    }
    //update
    function update(Request $req,$stud_id){
        
       
        $UpdateDetails= DB::update('update student set pre_institute = ?,pre_course = ?,percentage = ?,ypass = ?,sreg_no = ?,stud_status = ? where stud_id  = ?',
        [$req->input('pre_institute'),
        $req->input('pre_course'),
        $req->input('percentage'),
        $req->input('ypass'),
        $req->input('sreg_no'),
        $req->input('stud_status'),
        $stud_id ]);
        if($UpdateDetails)
        {
           return student::all();
        }
        else{
           return["result"=>"student table not updated"];
        }
    }

}
