<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Categorys()
    {
        return $this->belongsTo(Category::class);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
