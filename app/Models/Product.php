<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType = 'string';
    use HasFactory, HasRoles;

    protected $fillable = ['code', 'name', 'unit', 'price', 'image', 'category_id'];
}
