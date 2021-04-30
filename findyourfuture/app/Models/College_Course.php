<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College_Course extends Model
{
  
    public $table = "college_course";
    //use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    
  
    protected $fillable = [
        'fees',
        'mode',
        'placement',
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


