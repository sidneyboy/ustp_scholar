<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident_report extends Model
{
    use HasFactory;

    protected $fillable = [
        'coordinator_id',
        'scholar_id',
        'report_type',
        'action_taken',
        'report_date',
        'remarks',
    ];

    public function scholar()
    {
        return $this->belongsTo('App\Models\Scholar', 'scholar_id');
    }
}
