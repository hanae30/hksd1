<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest('id')->take(8)->get();

        return view('home', compact('products'));
    }

    // app/Http/Controllers/HomeController.php

    public function show(Product $product)
    {
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('product.product-detail', compact('product', 'relatedProducts'));
    }

    // app/Http/Controllers/HomeController.php

    public function catalog(Request $request)
    {
        $products = Product::with('category')
            ->when($request->search, fn($q, $search) => $q->where('name', 'like', "%{$search}%"))
            ->when($request->category, fn($q, $categoryId) => $q->where('category_id', $categoryId))
            ->when($request->sort === 'price_asc', fn($q) => $q->orderBy('price', 'asc'))
            ->when($request->sort === 'price_desc', fn($q) => $q->orderBy('price', 'desc'))
            ->when(!$request->sort, fn($q) => $q->orderBy('id', 'desc'))
            ->paginate(12)
            ->withQueryString();

        $categories = Category::all();

        return view('products', compact('products', 'categories'));
    }
}
