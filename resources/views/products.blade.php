<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Semua Produk - HKSD</title>
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
            <form method="GET" action="{{ route('products.index') }}" class="flex-1 max-w-xl mx-2">
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari perlengkapan layangan anda..."
                        class="w-full bg-brand-card text-gray-200 placeholder-gray-400 pl-10 pr-4 py-2 rounded-lg border border-brand-border focus:outline-none focus:border-brand-red text-sm transition">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 text-gray-400 text-sm"></i>
                </div>
            </form>
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

    <main class="max-w-7xl mx-auto px-4 py-10 flex-1">

        <nav class="text-xs text-gray-500 mb-4">
            <a href="/" class="hover:text-brand-red">Beranda</a> / <span class="text-white">Semua Produk</span>
        </nav>

        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-white tracking-wide">Semua Produk</h1>
                <p class="text-xs text-gray-400 mt-1">{{ $products->total() }} produk ditemukan</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            {{-- Sidebar Filter --}}
            <aside class="md:col-span-1">
                <div class="bg-brand-card border border-brand-border rounded-xl p-5 sticky top-20">

                    <form method="GET" action="{{ route('products.index') }}" id="filterForm">
                        @if(request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif

                        <div class="mb-6">
                            <h3 class="text-white font-bold text-sm mb-3">Kategori</h3>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 cursor-pointer group">
                                    <input type="radio" name="category" value="" onchange="document.getElementById('filterForm').submit()"
                                        class="accent-red-600 cursor-pointer" {{ !request('category') ? 'checked' : '' }}>
                                    <span class="text-sm text-gray-400 group-hover:text-white transition {{ !request('category') ? 'text-white font-semibold' : '' }}">Semua Kategori</span>
                                </label>
                                @foreach($categories as $category)
                                    <label class="flex items-center gap-2 cursor-pointer group">
                                        <input type="radio" name="category" value="{{ $category->id }}" onchange="document.getElementById('filterForm').submit()"
                                            class="accent-red-600 cursor-pointer" {{ request('category') == $category->id ? 'checked' : '' }}>
                                        <span class="text-sm text-gray-400 group-hover:text-white transition {{ request('category') == $category->id ? 'text-white font-semibold' : '' }}">{{ $category->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <h3 class="text-white font-bold text-sm mb-3">Urutkan</h3>
                            <select name="sort" onchange="document.getElementById('filterForm').submit()"
                                class="w-full bg-brand-bg border border-brand-border rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-brand-red cursor-pointer">
                                <option value="">Terbaru</option>
                                <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Harga Terendah</option>
                                <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Harga Tertinggi</option>
                            </select>
                        </div>
                    </form>

                    @if(request('category') || request('sort') || request('search'))
                        <a href="{{ route('products.index') }}" class="block text-center mt-5 text-xs text-brand-red hover:underline">
                            Reset Filter
                        </a>
                    @endif
                </div>
            </aside>

            {{-- Product Grid --}}
            <div class="md:col-span-3">
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 md:gap-6">
                    @forelse($products as $product)
                        <div class="bg-brand-card rounded-xl border border-brand-border overflow-hidden hover:border-brand-red/50 transition duration-300 group flex flex-col justify-between">
                            <a href="{{ route('product.show', $product) }}">
                                <div class="h-44 bg-neutral-800 relative flex items-center justify-center overflow-hidden">
                                    @if($product->image)
                                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                    @else
                                        <i class="fa-solid fa-box text-4xl text-neutral-600"></i>
                                    @endif

                                    @if($product->stock <= 5 && $product->stock > 0)
                                        <span class="absolute top-2 left-2 bg-brand-red text-white text-[10px] font-bold px-2 py-0.5 rounded">HOT</span>
                                    @elseif($product->stock == 0)
                                        <span class="absolute top-2 left-2 bg-gray-700 text-white text-[10px] font-bold px-2 py-0.5 rounded">HABIS</span>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <p class="text-xs text-gray-400 mb-1">{{ $product->category->name ?? '-' }}</p>
                                    <h3 class="font-semibold text-white text-sm line-clamp-2 group-hover:text-brand-red transition">
                                        {{ $product->name }}
                                    </h3>
                                </div>
                            </a>
                            <div class="p-4 pt-0">
                                <div class="flex items-center justify-between mt-2">
                                    <p class="text-base font-bold text-white">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                    <button type="button" onclick="addToCart({{ $product->id }})"
                                        class="bg-brand-red/10 text-brand-red hover:bg-brand-red hover:text-white p-2.5 rounded-lg transition cursor-pointer">
                                        <i class="fa-solid fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-20">
                            <i class="fa-solid fa-box-open text-5xl text-neutral-700 mb-4"></i>
                            <p class="text-gray-500">Tidak ada produk yang cocok dengan filter ini.</p>
                        </div>
                    @endforelse
                </div>

                @if($products->hasPages())
                    <div class="mt-8 flex justify-center">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </main>

    <footer class="bg-brand-nav border-t border-brand-border mt-auto text-xs text-gray-500 py-6">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2026 Hana Kite Shop Depok. All rights reserved.</p>
        </div>
    </footer>

    {{-- Cart Sidebar Panel (sama seperti halaman lain) --}}
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

        function addToCart(productId) {
            fetch(`/cart/add/${productId}`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
            }).then(res => res.json()).then(data => {
                renderCart(data);
                document.getElementById('cartPanel').classList.remove('translate-x-full');
                document.getElementById('cartOverlay').classList.remove('hidden');
            });
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
