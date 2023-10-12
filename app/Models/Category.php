<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /*
    However, before using the create method,
    you will need to specify either a fillable or guarded property on your model class.
     These properties are required because all Eloquent models are protected against mass assignment
     vulnerabilities by default.
    */
    use HasFactory;
    // protected $fillable  = ['name', 'category_id'];
    protected $guarded = ['id'];
}
