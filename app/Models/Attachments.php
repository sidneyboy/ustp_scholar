<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachments extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade_details_id',
        'attachment',
        'scholar_id',
        'status',
        'image_type',
    ];

    public function scholar()
    {
        return $this->belongsTo('App\Models\Scholar', 'scholar_id');
    }
}
