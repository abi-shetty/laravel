<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colleges;
use DB;

class CollegesController extends Controller
{

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
    function delete($col_id){
         
        $res= Colleges::where('col_id',$col_id)->delete();
        if($res)
        {
           return["result"=>" colleges  deleted successfully"];
        }
        else{
           return["result"=>"not deleted"];
        }
    }

    function show(){
         
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
    function update(Request $req,$col_id){
        
       
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

   
    
}


