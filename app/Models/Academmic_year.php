<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academmic_year extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_year',
    ];
}
