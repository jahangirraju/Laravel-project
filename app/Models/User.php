<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function images()
    {
        //return $this->hasMany(ProductImage::class);
        return $this->hasMany('App\Models\UserImage');
    }
}
