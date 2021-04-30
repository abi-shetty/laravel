<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table_Faculty extends Model
{
    public $table = "table_faculty";
    use HasFactory;

    protected $fillable = [
        'name',
        'department',
        'faculty',
        'quali',
        'contact_no',
        
    ];
}
