<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Define the fields that are mass assignable
    protected $fillable = [
        'client_title_en',
        'client_title_ar',
        'client_image',
    ];
}
