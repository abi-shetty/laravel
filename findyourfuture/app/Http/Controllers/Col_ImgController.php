<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Col_Img;
use DB;

class Col_ImgController extends Controller
{
    function col_imgadd(Request $req)
    {
        $col_img= new Col_Img;
        $col_img->image= $req->file('image')->store('apiDocs');
        $col_img->save();
        return $col_img;
    }

    function delete($ccid){
         
        $res= Col_Img::where('ccid',$ccid)->delete();
        if($res)
        {
           return["result"=>" col_img deleted successfully"];
        }
        else{
           return["result"=>"not deleted"];
        }
    }

    function show(){
         
        $res= Col_Img::all();
        if(!($res->isEmpty()))
        {
           return $res;
        }
        else{
           return["result"=>" not found"];
        }
    }
    /*function update(Request $req,$ccid ){
      $UpdateDetails= DB::update('update col_img set image= ? where ccid = ?',
      [$req->input('image'),
      $ccid]);
      if($UpdateDetails)
      {
         return Col_Img::all();
      }
      else{
         return["result"=>"col_img not updated"];
      }
  }*/
  function update(Request $req,$ccid ){
   $UpdateDetails= DB::update('update col_img set image = ? where ccid = ?',
   [$req->file('image')->store('apiDocs'),
   $ccid]);
   if($UpdateDetails)
   {
      return Col_Img::all();
   }
   else{
      return["result"=>"col_img not updated"];
   }
}
 
}

