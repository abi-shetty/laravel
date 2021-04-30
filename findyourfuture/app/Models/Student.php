<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $table = "student";
    use HasFactory;

    protected $fillable = [
        'pre_institute',
        'pre_course',
        'percentage',
        'ypass',
        'sreg_no',
        'stud_status',
						

    ];
}
