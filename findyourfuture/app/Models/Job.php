<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $table = "job";

    //use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    
  
    protected $fillable = [
        'title',
        'job_type',
        'position',
        'salary',
        'job_role',
        'experience',
        'key_skill',
        'qulification',
        'discription',
        'location',
        //'post_date',
        'applied_count',
        'jstatus'


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
    public function companies()
    {
        return $this->belongsToMany(Companies::class,'Job_Apply');
        
    }
  
}
