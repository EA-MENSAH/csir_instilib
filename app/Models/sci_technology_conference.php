<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sci_technology_conference extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'summary',
        'facilitator',
        'info_src',
        'comments',
    ];
}
