<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade_details extends Model
{
    use HasFactory;

    protected $fillable = [
        'scholar_id',
        'school_id',
        'academic_year_id',
        'semester',
        'original_text_from_image'
    ];

    public function scholar()
    {
        return $this->belongsTo('App\Models\Scholar', 'scholar_id');
    }
    
    public function school()
    {
        return $this->belongsTo('App\Models\School', 'school_id');
    }

    public function academ()
    {
        return $this->belongsTo('App\Models\Academmic_year', 'academic_year_id');
    }

  

    public function attachment()
    {
        return $this->hasOne('App\Models\Attachments', 'grade_details_id');
    }
}
