<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Jobtype;

class JobtypeController extends Controller
{
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

    function update(Request $req,$jt_id){
        $UpdateDetails= DB::update('update jobtype set job_type = ? where jt_id = ?',[$req->input('job_type'),$jt_id]);
        if($UpdateDetails)
        {
           return $this->jobdisplay($jt_id);
        }
        else{
           return["result"=>"Job type not updated"];
        }
    }
}
