<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colleges extends Model
{
    public $table = "colleges";
    //use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    
  
    protected $fillable = [
        'c_name',
        'clocation',
        'caddress',
        'cno1',
        'cno2',
        'cemail_id',
        'About',
        'academic',
        'accommodation',
        'faculty',
        'infrastructure',
        'placement',
        'average',
        'affiliated_to',
        'certificate',
        'college_status',
        'cpassword'
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

