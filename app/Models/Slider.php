<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'slider_title',
        'slider_slug',
        'slider_url',
        'slider_file',
        'slider_must',
        'slider_content',
        'slider_status'
    ];
}