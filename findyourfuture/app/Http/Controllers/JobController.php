<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use DB;

class JobController extends Controller
{
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
       ///Job::insert($job);
        $job->save(); 
        return $job;

    }
    function delete($job_id){
         
        $res= Job::where('job_id',$job_id)->delete();
        if($res)
        {
           return["result"=>" job deleted successfully"];
        }
        else{
           return["result"=>"not deleted"];
        }
    }

    function show(){
         
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
}

