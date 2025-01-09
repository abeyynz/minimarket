<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Traits\HasRoles;

class Product extends Model
{
    protected $table = 'products';
    use HasFactory, HasRoles;

    protected $fillable = ['code', 'name', 'unit', 'price', 'image_url', 'category_id', 'stock', 'store_id'];

    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function store():BelongsTo{
        return $this->belongsTo(Store::class);
    }

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

}
