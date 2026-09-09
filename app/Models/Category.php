<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['name'];

    //banyak product dimiliki oleh 1 kategori

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
