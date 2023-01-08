<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    use HasFactory;

    protected $fillable = [
        'scholar_id',
        'subject_code',
        'subject_name',
        'subject_units',
        'subject_grades',
        'status',
        'submitted_date',
        'school_year',
        'semester',
    ];
}
