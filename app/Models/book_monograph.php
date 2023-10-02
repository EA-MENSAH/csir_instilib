<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book_monograph extends Model
{
    use HasFactory;

    protected $fillable = [
       'title',
       'summary',
       'authors',
       'year_publication',
       'identifier',
       'class_no',
       'accession_no',
       'publisher',
       'no_copies',
       'subject_area',
       'vol_issue_no',
    ];
}
