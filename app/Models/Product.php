<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'code'; // Set kolom code sebagai primary key
    public $incrementing = false;  // Karena kode adalah string
    protected $keyType = 'string';
    use HasFactory, HasRoles;

    protected $fillable = ['code', 'name', 'unit', 'price', 'stock','image_url', 'category_id'];
}
