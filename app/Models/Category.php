<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public static function category()
    {
        $category = Category::orderBy('id', 'desc')->get();

        return $category;
    }

    public function blogs()
    {
        return $this->belongsTo(Blog::class);
    }
    public function blog()
    {
        return $this->hasMany('App\Models\Blog');
    }
}
