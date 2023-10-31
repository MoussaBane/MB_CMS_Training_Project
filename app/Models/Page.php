<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_title',
        'page_slug',
        'page_file',
        'page_must',
        'page_content',
        'page_status'
    ];
}