<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'date', 'user_id', 'total', 'store_id'];
    public $timestamps = false;
    public function details():HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function store():BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

}
