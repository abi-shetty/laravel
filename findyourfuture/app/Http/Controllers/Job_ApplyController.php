<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job_Apply;
use DB;

class Job_ApplyController extends Controller
{
    function job_applyadd(Request $req)
    {
        $job_apply= new Job_Apply;
        $job_apply->cv= $req->file('cv')->store('apiDocs');
        $job_apply->do_apply= $req->input('do_apply');
       // $job_apply->do_apply= $req->input('do_apply');
        $job_apply->save();
        return $job_apply;

    }
    function delete($apply_id){
         
        $res= Job_Apply::where('apply_id',$apply_id)->delete();
        if($res)
        {
           return["result"=>" job apply deleted successfully"];
        }
        else{
           return["result"=>"not deleted"];
        }
    }

    function show(){
         
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
