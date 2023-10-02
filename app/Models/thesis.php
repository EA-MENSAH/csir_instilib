<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thesis extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'authors',
        'date',
        'summary',
        'yr_publication',
        'affiliate_inst',
        'no_copies',
        'accession_no',
    ];  
}
