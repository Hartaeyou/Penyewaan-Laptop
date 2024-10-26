<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{

    protected $table = "units";
    protected $fillable = ["name", "code", "description", "status", "price", "category_id"];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}

