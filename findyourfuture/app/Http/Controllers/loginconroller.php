<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\admin; 
use Illuminate\Http\Request;
use DB;

use App\Models\User;

class loginconroller extends Controller
{
    function addadmin(Request $req)
    {
        $admin= new admin;
        
        $admin->apassword= md5($req->input('apassword'));
        $admin->ausername= $req->input('ausername');
        $admin->save();
        return $admin;

    }//	
    //admin login
    function adminlogin(Request $req)
    {
       
        $username=$req->email;
        $password=$req->password;
        if($id=DB::table('admin')->where('ausername', $username)
                                  ->where ('apassword', md5($password))   
                                  ->value('Aid'))
                                    {
                                        session(['key' => $id]);
                                        //return ['key' => $id];
                                        //return response()->json($id);
                                        return response()->json(1);
                                        //return "login sucessfull vallue added to session";
                                    }
                                    else{
                                            //return ['key'=>0];
                                            return response()->json(0);
                                    }  
    }

//user login
function userlogin(Request $req)
{
   
    $username=$req->username;
    $password=$req->password;
    $sql = User::where(['uemail_id'=>$username,'upassword'=>$password])->get();
    if(count($sql))
    {
        $id = User::where(['uemail_id'=>$username,'upassword'=>$password])->value('user_id');
        $utype = User::where(['uemail_id'=>$username,'upassword'=>$password])->value('utype');
        session(['key' => $id]);
        //return ['key' => $id];
        return response()->json($id);
    }
    else{
            //return ['key'=>0];
            return response()->json(0);
    }  
}
}