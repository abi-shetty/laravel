<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobseeker extends Model
{
    public $table = "jobseeker";
    use HasFactory;

    protected $fillable = [
        'qualification',
        'skills',
        'resume',
        'fresher',
        'pre_comp',
        'experience',
        'pre_position',
        'pre_salary',
        
//							

    ];
}
