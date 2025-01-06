<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Store extends Model
{
    protected $table = 'stores';
    public $timestamps = false;
    use HasFactory, HasRoles;

    protected $fillable = ['name', 'location'];
}
