<?php
// app/Http/Controllers/CheckoutController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $cart = session('cart', []);
        $selectedIds = $request->input('selected_items', []);

        // Filter cart, ambil cuma item yang dicentang
        $checkoutItems = collect($cart)
            ->filter(fn($item) => in_array($item['id'], $selectedIds))
            ->values();

        if ($checkoutItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Pilih minimal 1 produk untuk checkout.');
        }

        // Simpan sementara di session, biar kalau di-refresh halaman checkout-nya nggak ilang
        session(['checkout_items' => $checkoutItems->toArray()]);

        $subtotal = $checkoutItems->sum(fn($item) => $item['price'] * $item['qty']);

        return view('checkout', [
            'items'    => $checkoutItems,
            'subtotal' => $subtotal,
        ]);
    }

    public function placeOrder(Request $request)
    {
        $checkoutItems = session('checkout_items', []);

        if (empty($checkoutItems)) {
            return redirect()->route('cart.index')->with('error', 'Tidak ada item untuk di-checkout.');
        }

        // TODO: simpan ke tabel orders & order_items di sini

        // Hapus item yang barusan di-checkout dari cart
        $cart = session('cart', []);
        foreach ($checkoutItems as $item) {
            unset($cart[$item['id']]);
        }
        session(['cart' => $cart]);
        session()->forget('checkout_items');

        return redirect('/')->with('success', 'Pesanan berhasil dibuat!');
    }
}
