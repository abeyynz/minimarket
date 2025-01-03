<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'category_id', 'name', 'unit', 'price', 'image_url'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
