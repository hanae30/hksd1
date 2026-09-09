<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    //
    use HasFactory;
    // protected $fillable = ['category_id','name','price','description'];
    protected $fillable = [
        'category_id',
        'name',
        'price',
        'stock',
        'desc',
        'image',
        'weight',
    ];

    // banyak produk memilki satu buah category pake blongs to
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
