<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\job;
use App\Models\Job_Apply;
use DB;

class CompanyController extends Controller
{
    // companies
    function add(Request $req)
    {
        $companies= new Companies;
        $companies->comp_name= $req->input('comp_name');
        $companies->caddress= $req->input('caddress');
        $companies->cphone= $req->input('cphone');
        $companies->cemail= $req->input('cemail');
        $companies->comp_cin= $req->input('comp_cin');
        $companies->comp_pass= $req->input('comp_pass');
        $companies->comp_status= $req->input('comp_status');
        $companies->save();
        return $companies;

    }
    function delete($com_id){
         
        $res= companies::where('com_id',$com_id)->delete();
        if($res)
        {
           return["result"=>" companies  deleted successfully"];
        }
        else{
           return["result"=>"not deleted"];
        }
    }

    function show(){    
        $res= Companies::all();
        if(!($res->isEmpty()))

        {
           return $res;
        }
        else{
           return["result"=>" not found"];
        }
    }

    function companiesupdate(Request $req,$com_id ){
        $CompaniesUpdateDetails= DB::update('update companies set comp_name = ?,caddress= ?,cphone = ?,cemail = ?,comp_cin = ?,comp_pass = ?,comp_status = ? where com_id = ?',
        [$req->input('comp_name'),
        $req->input('caddress'),
        $req->input('cphone'),
        $req->input('cemail'),
        $req->input('comp_cin'),
        $req->input('comp_pass'),
        $req->input('comp_status'),
        $com_id]);
        if($CompaniesUpdateDetails)
        {
           return Companies::all();
        }
        else{
           return["result"=>"companie not updated"];
        }
    }

    //job

    public function index()
    {
        //
    }
    
    function jobadd(Request $req)
    {
        $job= new Job;
        $job->title= $req->input('title');
        $job->job_type= $req->input('job_type');                                                 
        $job->position= $req->input('position');
        $job->salary= $req->input('salary');
        $job->job_role= $req->input('job_role');
        $job->experience= $req->input('experience');
        $job->key_skill= $req->input('key_skill');
        $job->qulification= $req->input('qulification');
        $job->discription= $req->input('discription');
        $job->location= $req->input('location');
        //$job->post_date= $req->input('post_date');
        $job->applied_count= $req->input('applied_count');
        $job->jstatus= $req->input('jstatus');
       // $job_apply->do_apply= $req->input('do_apply');
        $job->save();
        return $job;

    }
    //function delete($job_id){
        function Jobdelete($job_id){
         
        $res= Job::where('job_id',$job_id)->delete();
        if($res)
        {
           return["result"=>" job deleted successfully"];
        }
        else{
           return["result"=>"not deleted"];
        }
    }

    function Jobshow(){
         
        $res= Job::all();
        if(!($res->isEmpty()))
        {
           return $res;
        }
        else{
           return["result"=>" not found"];
        }
    }


    function jobupdate(Request $req,$job_id ){
        $JobUpdateDetails= DB::update('update job set title = ?,job_type= ?,position = ?,salary = ?,job_role = ?,experience = ?,key_skill = ?,qulification = ?,discription = ?,location = ?,applied_count = ?,jstatus = ? where job_id = ?',
        [$req->input('title'),
        $req->input('job_type'),
        $req->input('position'),
        $req->input('salary'),
        $req->input('job_role'),
        $req->input('experience'),
        $req->input('key_skill'),
        $req->input('qulification'),
        $req->input('discription'),
        $req->input('location'),
        $req->input('applied_count'),
        $req->input('jstatus'),
        $job_id]);
        if($JobUpdateDetails)
        {
           return Job::all();
        }
        else{
           return["result"=>"Job  not updated"];
        }
    }

    //Job_Apply
   // public function index()
    //{
        //
    //}
    function job_applyadd(Request $req)
    {
        $job_apply= new Job_Apply;
        $job_apply->cv= $req->file('cv')->store('apiDocs');
        $job_apply->do_apply= $req->input('do_apply');
       // $job_apply->do_apply= $req->input('do_apply');
        $job_apply->save();
        return $job_apply;

    }
    function Job_Applydelete($apply_id){
         
        $res= Job_Apply::where('apply_id',$apply_id)->delete();
        if($res)
        {
           return["result"=>" job apply deleted successfully"];
        }
        else{
           return["result"=>"not deleted"];
        }
    }

    function job_applyshow(){
         
        $res= Job_Apply::all();
        if(!($res->isEmpty()))
        {
           return $res;
        }
        else{
           return["result"=>" not found"];
        }
    }


    function job_applyupdate(Request $req,$apply_id ){
        $Job_ApplyUpdateDetails= DB::update('update job_apply set cv = ?,do_apply= ? where apply_id = ?',
        [$req->file('cv')->store('apiDocs'),
        $req->input('do_apply'),
        $apply_id]);
        if($Job_ApplyUpdateDetails)
        {
           return Job_Apply::all();
        }
        else{
           return["result"=>"job_apply not updated"];
        }
    }


}
