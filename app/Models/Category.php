<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $fillable = [
        'name', 'image', 'starting_price'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
