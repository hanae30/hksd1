<?php
// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['qty']);

        return response()->json([
            'items'    => $cart,
            'subtotal' => $subtotal,
            'count'    => collect($cart)->sum('qty'),
        ]);
    }

    public function add(Product $product)
    {
        $cart = session('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['qty']++;
        } else {
            $cart[$product->id] = [
                'id'       => $product->id,
                'name'     => $product->name,
                'category' => $product->category->name ?? '-',
                'price'    => $product->price,
                'image'    => $product->image,
                'qty'      => 1,
            ];
        }

        session(['cart' => $cart]);

        return $this->index();
    }

    public function update(Request $request, $productId)
    {
        $cart = session('cart', []);
        $action = $request->input('action'); // 'increase' atau 'decrease'

        if (isset($cart[$productId])) {
            if ($action === 'increase') {
                $cart[$productId]['qty']++;
            } elseif ($action === 'decrease') {
                $cart[$productId]['qty']--;
                if ($cart[$productId]['qty'] <= 0) {
                    unset($cart[$productId]);
                }
            }
        }

        session(['cart' => $cart]);

        return $this->index();
    }

    public function remove($productId)
    {
        $cart = session('cart', []);
        unset($cart[$productId]);
        session(['cart' => $cart]);

        return $this->index();
    }

    public function clear()
    {
        session(['cart' => []]);
        return $this->index();
    }
}
