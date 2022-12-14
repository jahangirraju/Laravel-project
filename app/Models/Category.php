<?php

namespace App\Models;

use App\Models\Category as ModelsCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
