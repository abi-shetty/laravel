<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table_faculty;
use DB;

class TableFacultyController extends Controller
{
    function create(Request $req)
    {
        $table_faculty= new Table_Faculty;
        $table_faculty->name= $req->input('name');
        $table_faculty->department= $req->input('department');
        $table_faculty->faculty= $req->input('faculty');
        $table_faculty->quali= $req->input('quali');
        $table_faculty->contact_no= $req->input('contact_no');
        $table_faculty->save();
        return $table_faculty;

    }

   //delete
   function delete($f_id){
         
    $res= Table_Faculty::where('f_id',$f_id)->delete();
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
         
        $res= Table_Faculty::all();
        if(!($res->isEmpty()))
        {
           return $res;
        }
        else{
           return["result"=>"student not found"];
        }
    }
    //update
    function update(Request $req,$f_id){
        
       
        $UpdateDetails= DB::update('update table_faculty set name = ?,department = ?,faculty = ?,quali = ?,contact_no = ? where f_id   = ?',
        [$req->input('name'),
        $req->input('department'),
        $req->input('faculty'),
        $req->input('quali'),
        $req->input('contact_no'),
        $f_id]);
        if($UpdateDetails)
        {
           return Table_Faculty::all();
        }
        else{
           return["result"=>" table not updated"];
        }
    }
}
