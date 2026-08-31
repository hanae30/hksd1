<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use HasFactory;
    protected $fillable = ['category_id','name','price','description'];

    // banyak produk memilki satu buah category pake blongs to
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
