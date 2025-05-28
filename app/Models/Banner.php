<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    // Explicitly specify the table name
    protected $table = 'pages_banner';  // Table name is 'pages_banner'

    // If you have any specific columns you want to allow mass assignment on, you can define $fillable here
    protected $fillable = [
        'title_en',
        'title_ar',
        'image',
    ];
}
