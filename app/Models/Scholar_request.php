<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholar_request extends Model
{
    use HasFactory;

    protected $fillable = [
        'scholar_id',
        'request_name',
        'request_details',
        'request_type',
        'request_date',
        'status',
        'file',
        'semester',
        'school',
        'school_year',
        'course',
    ];

    public function scholar()
    {
        return $this->belongsTo('App\Models\Scholar', 'scholar_id');
    }
}
