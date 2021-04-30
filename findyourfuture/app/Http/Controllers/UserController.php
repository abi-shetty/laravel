<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UserController extends Controller
{
    function add(Request $req)
    {
        $users= new User;
        $users->full_name= $req->input('full_name');
        $users->gender= $req->input('gender');
        $users->uemail_id= $req->input('uemail_id');
        $users->ucontact_no= $req->input('ucontact_no');
        $users->uaddress= $req->input('uaddress');
        $users->utype= $req->input('utype');
        $users->upassword= $req->input('upassword');
        $users->ustatus= $req->input('ustatus');
        $users->save();
        return $users;

    }//	
    //delete
    function delete($user_id){
         
        $res= User::where('user_id',$user_id)->delete();
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
         
        $res= User::all();
        if(!($res->isEmpty()))
        {
           return $res;
        }
        else{
           return["result"=>"user not found"];
        }
    }

    //update
    function update(Request $req,$user_id){
        
       
        $UpdateDetails= DB::update('update users set full_name = ?,gender = ?,uemail_id = ?,ucontact_no = ?,uaddress = ?,utype = ?,upassword = ?,ustatus = ? where user_id = ?',
        [$req->input('full_name'),
        $req->input('gender'),
        $req->input('uemail_id'),
        $req->input('ucontact_no'),
        $req->input('uaddress'),
        $req->input('utype'),
        $req->input('upassword'),
        $req->input('ustatus'),
        $user_id]);

        //$UpdateDetails=DB::table('users')->where('user_id',$data['user_id'])->limit(1)->update(['full_name'=> $data['full_name'],'gender'=> $data['gender'],'uemail_id'=> $data['uemail_id'],'ucontact_no'=> $data['ucontact_no'],'uaddress'=> $data['uaddress'],'utype'=> $data['utype'],'upassword'=> $data['upassword'],'ustatus'=> $data['ustatus']]);
        if($UpdateDetails)
        {
           return User::all();
        }
        else{
           return["result"=>"Job type not updated"];
        }
    }
    
}
