<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;
    protected $table = 'about_section';
    protected $fillable = [
        'about_section_description_en',
        'about_section_description_ar',
    ];
}
