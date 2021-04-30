<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    public $table = "courses";

    protected $fillable = [
        'course',
        'stream',
        'after',
        'duration',
        'type',
        'about',
        'exam_type',
        'eligibility',
        'recruitment',
        'jobs',
        'fees'

        
    ];
//											
}
