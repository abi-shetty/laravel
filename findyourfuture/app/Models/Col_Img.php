<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Col_Img extends Model
{
    public $table = "col_img";
    //use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    
  
    protected $fillable = [
        'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   /* protected $hidden = [
        'password', 'remember_token',
    ]; */
    //public $timestamps=false;
     

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
  
}


