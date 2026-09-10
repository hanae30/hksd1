<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }} - HKSD</title>
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
<body class="bg-brand-bg text-gray-200 font-sans min-h-screen flex flex-col">

    <header class="bg-brand-nav border-b border-brand-border sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between gap-4">
            <a href="/" class="flex items-center gap-2">
                <div class="bg-brand-red text-white font-black px-3 py-1 rounded tracking-wider text-xl">HKSD</div>
                <div class="hidden sm:block text-xs leading-tight">
                    <span class="block font-bold text-white">Hana Kite Shop</span>
                    <span class="text-gray-400">Depok</span>
                </div>
            </a>
            <div class="flex-1 max-w-xl mx-2">
                <div class="relative">
                    <input type="text" placeholder="Cari perlengkapan layangan anda..."
                        class="w-full bg-brand-card text-gray-200 placeholder-gray-400 pl-10 pr-4 py-2 rounded-lg border border-brand-border focus:outline-none focus:border-brand-red text-sm transition">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 text-gray-400 text-sm"></i>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <button type="button" onclick="toggleCartPanel()" class="relative p-2 text-gray-300 hover:text-brand-red transition cursor-pointer">
                    <i class="fa-solid fa-cart-shopping text-xl"></i>
                    <span id="cartBadge" class="absolute -top-1 -right-1 bg-brand-red text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">0</span>
                </button>
                <button class="bg-transparent border border-brand-red text-brand-red hover:bg-brand-red hover:text-white px-4 py-1.5 rounded-lg text-sm font-semibold transition">
                    <a href="/login">Masuk</a>
                </button>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8 flex-1">

        <nav class="text-xs text-gray-500 mb-6">
            <a href="/" class="hover:text-brand-red">Beranda</a> /
            <span class="text-gray-300">{{ $product->category->name ?? '-' }}</span> /
            <span class="text-white">{{ $product->name }}</span>
        </nav>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-16">

            {{-- Gambar Produk --}}
            <div>
                <div class="aspect-square bg-brand-card rounded-xl border border-brand-border overflow-hidden mb-3">
                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <i class="fa-solid fa-box text-6xl text-neutral-600"></i>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Info Produk --}}
            <div>
                <h1 class="text-2xl font-bold text-white mb-2">{{ $product->name }}</h1>
                <p class="text-xs text-brand-red font-semibold mb-4">{{ $product->category->name ?? '-' }}</p>

                <p class="text-3xl font-black text-white mb-6">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                <div class="mb-6">
                    @if($product->stock == 0)
                        <span class="text-xs font-bold px-3 py-1.5 rounded-full bg-red-500/10 text-red-400 border border-red-500/20">Stok Habis</span>
                    @elseif($product->stock <= 5)
                        <span class="text-xs font-bold px-3 py-1.5 rounded-full bg-amber-500/10 text-amber-400 border border-amber-500/20">Stok Menipis — sisa {{ $product->stock }}</span>
                    @else
                        <span class="text-xs font-bold px-3 py-1.5 rounded-full bg-green-500/10 text-green-400 border border-green-500/20">Stok Tersedia ({{ $product->stock }})</span>
                    @endif
                </div>

                @if($product->weight)
                    <p class="text-sm text-gray-400 mb-4"><i class="fa-solid fa-weight-hanging mr-2"></i>Berat: {{ $product->weight }} kg</p>
                @endif

                <div class="flex items-center gap-3 mb-6">
                    <span class="text-sm text-gray-400">Jumlah</span>
                    <div class="flex items-center gap-2">
                        <button onclick="changeQty(-1)" class="w-8 h-8 bg-gray-700 hover:bg-gray-600 text-white rounded flex items-center justify-center cursor-pointer">-</button>
                        <span id="detailQty" class="text-white w-8 text-center">1</span>
                        <button onclick="changeQty(1)" class="w-8 h-8 bg-gray-700 hover:bg-gray-600 text-white rounded flex items-center justify-center cursor-pointer">+</button>
                    </div>
                </div>

                <div class="flex gap-3 mb-8">
                    <button onclick="addToCartDetail({{ $product->id }})"
                        class="flex-1 bg-brand-red/10 text-brand-red hover:bg-brand-red hover:text-white py-3 rounded-lg font-semibold text-sm transition cursor-pointer">
                        <i class="fa-solid fa-cart-plus mr-2"></i>Tambah Keranjang
                    </button>
                    <button onclick="addToCartDetail({{ $product->id }}); toggleCartPanel();"
                        class="flex-1 bg-brand-red hover:bg-brand-redHover text-white py-3 rounded-lg font-semibold text-sm transition cursor-pointer">
                        Beli Sekarang
                    </button>
                </div>

                @if($product->desc)
                    <div class="border-t border-brand-border pt-6">
                        <h3 class="text-white font-bold text-sm mb-2">Deskripsi Produk</h3>
                        <p class="text-sm text-gray-400 leading-relaxed whitespace-pre-line">{{ $product->desc }}</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Produk Terkait --}}
        @if($relatedProducts->count())
            <div>
                <h2 class="text-xl font-bold text-white mb-6">Produk Terkait</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    @foreach($relatedProducts as $related)
                        <a href="{{ route('product.show', $related) }}"
                            class="bg-brand-card rounded-xl border border-brand-border overflow-hidden hover:border-brand-red/50 transition group">
                            <div class="h-32 bg-neutral-800 flex items-center justify-center overflow-hidden">
                                @if($related->image)
                                    <img src="{{ asset('storage/'.$related->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                @else
                                    <i class="fa-solid fa-box text-3xl text-neutral-600"></i>
                                @endif
                            </div>
                            <div class="p-3">
                                <p class="text-xs text-gray-400 mb-1">{{ $related->category->name ?? '-' }}</p>
                                <h4 class="text-white text-sm font-medium line-clamp-1 group-hover:text-brand-red">{{ $related->name }}</h4>
                                <p class="text-brand-red font-bold text-sm mt-1">Rp {{ number_format($related->price, 0, ',', '.') }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

    </main>

    <footer class="bg-brand-nav border-t border-brand-border mt-auto text-xs text-gray-500 py-6">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2026 Hana Kite Shop Depok. All rights reserved.</p>
        </div>
    </footer>

    {{-- Cart Sidebar Panel (sama seperti di home.blade.php) --}}
    <div id="cartOverlay" class="fixed inset-0 bg-black/70 z-50 hidden" onclick="toggleCartPanel()"></div>
    <div id="cartPanel" class="fixed top-0 right-0 h-full w-full max-w-sm bg-brand-nav border-l border-brand-border z-50 transform translate-x-full transition-transform duration-300 flex flex-col">
        <div class="flex items-center justify-between p-5 border-b border-brand-border">
            <h3 class="font-bold text-white text-lg">Keranjang Belanja Anda</h3>
            <button type="button" onclick="toggleCartPanel()" class="text-gray-400 hover:text-white cursor-pointer">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>
        <div id="cartItemsWrapper" class="flex-1 overflow-y-auto p-5 space-y-4">
            <p class="text-center text-gray-500 text-sm py-10">Keranjang masih kosong.</p>
        </div>
        <div class="border-t border-brand-border p-5 space-y-3">
            <div class="flex items-center gap-2 mb-1">
                <input type="checkbox" id="selectAll" onchange="toggleSelectAll(this)" class="w-4 h-4 accent-red-600 cursor-pointer">
                <label for="selectAll" class="text-white text-sm cursor-pointer">Pilih semua</label>
            </div>
            <div class="flex items-center justify-between text-white font-bold">
                <span>Subtotal</span>
                <span id="cartSubtotal">Rp 0</span>
            </div>
            <form id="checkoutForm" action="{{ route('checkout.index') }}" method="POST">
                @csrf
                <div id="checkoutInputsWrapper"></div>
                <button type="submit" class="w-full bg-brand-red hover:bg-brand-redHover text-white py-2.5 rounded-lg font-semibold text-sm transition cursor-pointer">
                    Checkout
                </button>
            </form>
            <button type="button" onclick="clearCart()" class="w-full bg-gray-700 hover:bg-gray-600 text-brand-red py-2.5 rounded-lg font-semibold text-sm transition cursor-pointer">
                Hapus
            </button>
        </div>
    </div>

    <script>
        let detailQty = 1;
        function changeQty(delta) {
            detailQty = Math.max(1, detailQty + delta);
            document.getElementById('detailQty').innerText = detailQty;
        }

        function addToCartDetail(productId) {
            fetch(`/cart/add/${productId}`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify({ qty: detailQty })
            })
            .then(res => res.json())
            .then(data => renderCart(data));
        }

        // --- Fungsi cart sama persis seperti di home.blade.php ---
        function toggleCartPanel() {
            const panel = document.getElementById('cartPanel');
            const overlay = document.getElementById('cartOverlay');
            const isOpen = !panel.classList.contains('translate-x-full');
            if (isOpen) {
                panel.classList.add('translate-x-full');
                overlay.classList.add('hidden');
            } else {
                panel.classList.remove('translate-x-full');
                overlay.classList.remove('hidden');
                loadCart();
            }
        }

        function formatRupiah(angka) { return 'Rp ' + Number(angka).toLocaleString('id-ID'); }

        function renderCart(data) {
            const wrapper = document.getElementById('cartItemsWrapper');
            document.getElementById('cartBadge').innerText = data.count;
            document.getElementById('cartSubtotal').innerText = formatRupiah(data.subtotal);
            const items = Object.values(data.items);
            if (items.length === 0) {
                wrapper.innerHTML = '<p class="text-center text-gray-500 text-sm py-10">Keranjang masih kosong.</p>';
                document.getElementById('checkoutInputsWrapper').innerHTML = '';
                return;
            }
            wrapper.innerHTML = items.map(item => `
                <div class="flex gap-3 pb-4 border-b border-brand-border">
                    <input type="checkbox" class="cart-select-item w-4 h-4 accent-red-600 cursor-pointer mt-1 shrink-0" data-id="${item.id}" onchange="syncCheckoutInputs()" checked>
                    <div class="w-16 h-16 rounded-lg bg-neutral-800 overflow-hidden shrink-0">
                        ${item.image ? `<img src="/storage/${item.image}" class="w-full h-full object-cover">` : `<div class="w-full h-full flex items-center justify-center"><i class="fa-solid fa-box text-neutral-600"></i></div>`}
                    </div>
                    <div class="flex-1">
                        <h4 class="text-white font-semibold text-sm">${item.name}</h4>
                        <p class="text-xs text-gray-400 mb-1">${item.category}</p>
                        <div class="flex items-center gap-2 mb-1">
                            <button onclick="updateQty(${item.id}, 'decrease')" class="w-6 h-6 bg-gray-700 hover:bg-gray-600 text-white rounded flex items-center justify-center text-xs cursor-pointer">-</button>
                            <span class="text-white text-sm w-4 text-center">${item.qty}</span>
                            <button onclick="updateQty(${item.id}, 'increase')" class="w-6 h-6 bg-gray-700 hover:bg-gray-600 text-white rounded flex items-center justify-center text-xs cursor-pointer">+</button>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">${formatRupiah(item.price)}</span>
                            <span class="text-brand-red font-bold text-sm">${formatRupiah(item.price * item.qty)}</span>
                        </div>
                    </div>
                </div>
            `).join('');
            syncCheckoutInputs();
        }

        function syncCheckoutInputs() {
            const wrapper = document.getElementById('checkoutInputsWrapper');
            wrapper.innerHTML = '';
            document.querySelectorAll('.cart-select-item:checked').forEach(cb => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'selected_items[]';
                input.value = cb.dataset.id;
                wrapper.appendChild(input);
            });
        }

        function toggleSelectAll(source) {
            document.querySelectorAll('.cart-select-item').forEach(cb => cb.checked = source.checked);
            syncCheckoutInputs();
        }

        function loadCart() {
            fetch('/cart').then(res => res.json()).then(data => renderCart(data));
        }

        function updateQty(productId, action) {
            fetch(`/cart/update/${productId}`, {
                method: 'PATCH',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify({ action })
            }).then(res => res.json()).then(data => renderCart(data));
        }

        function clearCart() {
            if (!confirm('Hapus semua item di keranjang?')) return;
            fetch('/cart/clear', {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
            }).then(res => res.json()).then(data => renderCart(data));
        }

        document.addEventListener('DOMContentLoaded', loadCart);
    </script>

</body>
</html>
