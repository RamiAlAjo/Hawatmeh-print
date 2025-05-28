<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the table name if it's different from the plural form of the model name
    // protected $table = 'products';

    // The attributes that are mass assignable
    protected $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'image',
        'images',
        'features_en',
        'features_ar',
        'benefits_en',
        'benefits_ar'
    ];

    // If you're storing 'images' as a JSON field, you may want to cast it as an array
    protected $casts = [
        'images' => 'array',
    ];

    // If you want to add relationships in the future, you can define them here
    // For example, if a product has many orders or categories, you would add:
    // public function orders()
    // {
    //     return $this->hasMany(Order::class);
    // }
}
