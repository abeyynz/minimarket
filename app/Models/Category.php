<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = false;
    use HasFactory, HasRoles;

    protected $fillable = ['name', 'code'];
}
