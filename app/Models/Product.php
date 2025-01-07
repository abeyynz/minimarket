<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Traits\HasRoles;

class Product extends Model
{
    protected $table = 'products';
    public $incrementing = false;
    protected $keyType = 'string';
    use HasFactory, HasRoles;

    protected $fillable = ['code', 'name', 'unit', 'price', 'stock','image_url', 'category_id'];

    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }
}
