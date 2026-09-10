<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout - HKSD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: { extend: { colors: { brand: {
                red: '#E50914', redHover: '#B81D24', bg: '#121212', card: '#1E1E1E', nav: '#0A0A0A', border: '#2A2A2A'
            }}}}
        }
    </script>
</head>
<body class="bg-brand-bg text-gray-200 font-sans min-h-screen">

    <header class="bg-brand-nav border-b border-brand-border sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 py-4 flex items-center justify-between">
            <h1 class="text-lg font-bold text-white">Checkout</h1>
            <a href="{{ route('cart.index') }}" class="text-sm text-gray-400 hover:text-white">
                <i class="fa-solid fa-arrow-left mr-1"></i> Kembali ke Keranjang
            </a>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 py-8">

        @if(session('error'))
            <div class="mb-4 text-sm text-red-400 bg-red-500/10 border border-red-500/20 px-4 py-3 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-brand-card border border-brand-border rounded-xl overflow-hidden mb-6">
            <div class="px-5 py-4 border-b border-brand-border">
                <h3 class="text-white font-bold text-sm">Ringkasan Pesanan</h3>
            </div>

            <div class="divide-y divide-brand-border">
                @foreach($items as $item)
                    <div class="flex items-center gap-4 p-5">
                        <div class="w-16 h-16 rounded-lg bg-neutral-800 overflow-hidden shrink-0">
                            @if($item['image'])
                                <img src="{{ asset('storage/'.$item['image']) }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <i class="fa-solid fa-box text-neutral-600"></i>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <h4 class="text-white font-semibold text-sm">{{ $item['name'] }}</h4>
                            <p class="text-xs text-gray-400">{{ $item['category'] }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $item['qty'] }} x Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-brand-red font-bold text-sm">
                                Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="px-5 py-4 border-t border-brand-border flex items-center justify-between">
                <span class="text-white font-semibold">Subtotal</span>
                <span class="text-white font-bold text-lg">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
            </div>
        </div>

        <div class="bg-brand-card border border-brand-border rounded-xl p-5 mb-6">
            <h3 class="text-white font-bold text-sm mb-3">Alamat Pengiriman</h3>
            <textarea placeholder="Masukkan alamat lengkap..." rows="3"
                class="w-full bg-brand-bg border border-brand-border rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-brand-red"></textarea>
        </div>

        <form action="{{ route('checkout.place') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full bg-brand-red hover:bg-brand-redHover text-white py-3 rounded-lg font-semibold text-sm transition cursor-pointer">
                Buat Pesanan — Rp {{ number_format($subtotal, 0, ',', '.') }}
            </button>
        </form>

    </main>

</body>
</html>
