<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer_logs extends Model
{
    use HasFactory;

    protected $fillable = [
        'scholar_id',
        'transfer_from',
        'transfer_to',
        'request_id',
    ];
}
