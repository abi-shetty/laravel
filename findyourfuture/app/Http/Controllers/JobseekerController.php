<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobseeker;
use DB;

class JobseekerController extends Controller
{
    function create(Request $req)
    {
        $jobseeker= new Jobseeker;
        $jobseeker->qualification= $req->input('qualification');
        $jobseeker->skills= $req->input('skills');
        $jobseeker->resume= $req->file('resume')->store('apiDocs');
        $jobseeker->fresher= $req->input('fresher');
        $jobseeker->pre_comp= $req->input('pre_comp');
        $jobseeker->pre_position= $req->input('pre_position');
        $jobseeker->pre_salary= $req->input('pre_salary');
        $jobseeker->save();
        return $jobseeker;

    }
    //delete
    function delete($jseeker_id){
         
        $res= jobseeker::where('jseeker_id',$jseeker_id)->delete();
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
         
        $res= Jobseeker::all();
        if(!($res->isEmpty()))
        {
           return $res;
        }
        else{
           return["result"=>"Job seeker not found"];
        }
    }
    //update
    function update(Request $req,$jseeker_id ){
        
       
        $UpdateDetails= DB::update('update jobseeker set qualification = ?,skills = ?,resume = ?,fresher = ?,pre_comp = ?,experience = ?,pre_position = ?,pre_salary = ? where jseeker_id = ?',
        [$req->input('qualification'),
        $req->input('skills'),
        $req->file('resume')->store('apiDocs'),
        $req->input('fresher'),
        $req->input('pre_comp'),
        $req->input('experience'),
        $req->input('pre_position'),
        $req->input('pre_salary'),
        $jseeker_id]);
        if($UpdateDetails)
        {
           return Jobseeker::all();
        }
        else{
           return["result"=>"Job seeker not updated"];
        }
    }
}
