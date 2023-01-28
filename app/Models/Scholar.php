<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'age',
        'address',
        'number',
        'gender',
        'email',
        'password',
        'status',
        'course',
        'semester_start',
        'semester_end',
        'school_year_start',
        'school_year_end',
        'school',
        'year_level',
        'user_type',
        'student_no',
    ];

    public function grade_details()
    {
        return $this->hasMany('App\Models\Grade_details', 'scholar_id')->orderBy('id','desc');
    }

    public function attachments()
    {
        return $this->hasMany('App\Models\Attachments', 'scholar_id')->orderBy('id','desc');
    }
}
