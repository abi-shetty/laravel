<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use DB;

class CompaniesController extends Controller
{
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
   
    
}



