@extends('dashboard.sidebar')
@section('content')
<main class="flex-1 p-6 md:p-10 overflow-y-auto">
    <div class="max-w-6xl mx-auto">

        <div class="mb-6">
            <h1 class="text-xl font-bold text-white tracking-wide">Product</h1>
            <p class="text-xs text-zinc-400 mt-0.5">Kelola daftar produk POSMart</p>
        </div>

        @if(session('success'))
            <div class="mb-4 text-xs text-green-400 bg-green-500/10 border border-green-500/20 px-3 py-2 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
            <div class="bg-[#121214] p-5 rounded-2xl border border-zinc-800/80 shadow-sm">
                <p class="text-[11px] font-semibold text-zinc-400 uppercase tracking-wider mb-2">Total Produk</p>
                <p class="text-2xl font-black text-white tracking-tight">{{ $totalProduk }}</p>
            </div>
            <div class="bg-[#121214] p-5 rounded-2xl border border-zinc-800/80 shadow-sm">
                <p class="text-[11px] font-semibold text-zinc-400 uppercase tracking-wider mb-2">Stok Menipis</p>
                <p class="text-2xl font-black text-red-500 tracking-tight">{{ $stokMenipis }}</p>
            </div>
            <div class="bg-[#121214] p-5 rounded-2xl border border-zinc-800/80 shadow-sm">
                <p class="text-[11px] font-semibold text-zinc-400 uppercase tracking-wider mb-2">Stok Habis</p>
                <p class="text-2xl font-black text-white tracking-tight">{{ $stokHabis }}</p>
            </div>
        </div>

        <div class="bg-[#121214] rounded-2xl border border-zinc-800/80 shadow-sm overflow-hidden">
            <div class="px-5 py-4 border-b border-zinc-800/80 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4">
                <h3 class="font-bold text-white text-sm shrink-0">Daftar Produk</h3>
                <div class="flex items-center gap-3 flex-1 justify-end">
                    <form method="GET" class="relative flex-1 max-w-xs">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..."
                            class="w-full bg-zinc-900/60 border border-zinc-700/60 rounded-lg px-3 py-1.5 text-xs text-white focus:outline-none focus:border-red-600 transition-colors" />
                    </form>
                    <button type="button" onclick="openProductModal('add')"
                        class="px-4 py-2 bg-red-600 hover:bg-red-500 text-white text-xs font-bold rounded-xl transition-all shadow-md shadow-red-900/30 cursor-pointer shrink-0">
                        + Tambah Produk
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-xs">
                    <thead>
                        <tr class="border-b border-zinc-800/80 text-zinc-500 uppercase tracking-wider">
                            <th class="text-left px-5 py-3 font-semibold">Produk</th>
                            <th class="text-left px-5 py-3 font-semibold">Kategori</th>
                            <th class="text-right px-5 py-3 font-semibold">Harga</th>
                            <th class="text-right px-5 py-3 font-semibold">Stok</th>
                            <th class="text-center px-5 py-3 font-semibold">Status</th>
                            <th class="text-right px-5 py-3 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/60">
                        @forelse($products as $product)
                            <tr class="hover:bg-zinc-800/30 transition-colors">
                                <td class="px-5 py-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-lg bg-zinc-800 overflow-hidden shrink-0 border border-zinc-700/50">
                                            <img src="{{ $product->image ? asset('storage/'.$product->image) : 'https://via.placeholder.com/100' }}" class="w-full h-full object-cover">
                                        </div>
                                        <span class="font-medium text-white">{{ $product->name }}</span>
                                    </div>
                                </td>
                                <td class="px-5 py-3 text-zinc-400">{{ $product->category->name ?? '-' }}</td>
                                <td class="px-5 py-3 text-right font-mono text-zinc-200">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="px-5 py-3 text-right font-mono text-zinc-200">{{ $product->stock }}</td>
                                <td class="px-5 py-3 text-center">
                                    @if($product->stock == 0)
                                        <span class="text-[10px] font-bold px-2.5 py-1 rounded-full bg-red-500/10 text-red-400 border border-red-500/20">Stok Habis</span>
                                    @elseif($product->stock <= 5)
                                        <span class="text-[10px] font-bold px-2.5 py-1 rounded-full bg-amber-500/10 text-amber-400 border border-amber-500/20">Menipis</span>
                                    @else
                                        <span class="text-[10px] font-bold px-2.5 py-1 rounded-full bg-green-500/10 text-green-400 border border-green-500/20">Tersedia</span>
                                    @endif
                                </td>
                                <td class="px-5 py-3 text-right">
                                    <button type="button"
                                        onclick='openProductModal("edit", {{ $product->id }}, "{{ $product->category_id }}", "{{ addslashes($product->name) }}", "{{ $product->price }}", "{{ $product->stock }}", "{{ addslashes($product->desc) }}", "{{ $product->weight }}")'
                                        class="text-zinc-400 hover:text-white text-xs mr-3 cursor-pointer">Edit</button>
                                    <form action="{{ route('product.destroy', $product) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Yakin mau hapus produk ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400 text-xs cursor-pointer">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="p-12 text-center text-zinc-500">Belum ada produk.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($products->hasPages())
                <div class="px-5 py-4 border-t border-zinc-800/80">{{ $products->links() }}</div>
            @endif
        </div>
    </div>
</main>

{{-- Modal Tambah/Edit Produk --}}
<div id="productModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 hidden">
    <div class="absolute inset-0" onclick="closeProductModal()"></div>
    <div class="relative bg-zinc-900 border border-zinc-800 rounded-2xl w-full max-w-md max-h-[90vh] overflow-y-auto z-10 shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-zinc-800">
            <h3 id="productModalTitle" class="font-bold text-white text-sm">Tambah Produk</h3>
            <button type="button" onclick="closeProductModal()" class="text-zinc-500 hover:text-white cursor-pointer">✕</button>
        </div>

        <form id="productForm" method="POST" enctype="multipart/form-data" class="p-5 space-y-4">
            @csrf
            <input type="hidden" name="_method" id="productMethod" value="POST">

            @if($errors->any())
                <div class="text-xs text-red-400 bg-red-500/10 border border-red-500/20 px-3 py-2 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <div class="space-y-1">
                <label class="text-xs font-semibold text-zinc-400">Gambar Produk</label>
                <input type="file" name="image" accept="image/*"
                    class="w-full bg-zinc-800 border border-zinc-700 rounded-lg px-3 py-2 text-xs text-white" />
            </div>

            <div class="space-y-1">
                <label class="text-xs font-semibold text-zinc-400">Nama Produk</label>
                <input type="text" name="name" id="prodName" required
                    class="w-full bg-zinc-800 border border-zinc-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-red-600" />
            </div>

            <div class="space-y-1">
                <label class="text-xs font-semibold text-zinc-400">Kategori</label>
                <select name="category_id" id="prodCategory" required
                    class="w-full bg-zinc-800 border border-zinc-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-red-600">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div class="space-y-1">
                    <label class="text-xs font-semibold text-zinc-400">Harga (Rp)</label>
                    <input type="number" name="price" id="prodPrice" required min="0"
                        class="w-full bg-zinc-800 border border-zinc-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-red-600" />
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-semibold text-zinc-400">Stok</label>
                    <input type="number" name="stock" id="prodStock" required min="0"
                        class="w-full bg-zinc-800 border border-zinc-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-red-600" />
                </div>
            </div>

            <div class="space-y-1">
                <label class="text-xs font-semibold text-zinc-400">Berat (kg)</label>
                <input type="number" step="0.01" name="weight" id="prodWeight" min="0"
                    class="w-full bg-zinc-800 border border-zinc-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-red-600" />
            </div>

            <div class="space-y-1">
                <label class="text-xs font-semibold text-zinc-400">Deskripsi</label>
                <textarea name="desc" id="prodDesc" rows="3"
                    class="w-full bg-zinc-800 border border-zinc-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-red-600"></textarea>
            </div>

            <button type="submit" id="productSubmitBtn"
                class="w-full mt-2 py-2.5 bg-red-600 hover:bg-red-500 text-white font-bold text-xs rounded-xl transition-colors shadow-md shadow-red-900/30">
                Tambah Produk
            </button>
        </form>
    </div>
</div>

<script>
    const productModal = document.getElementById('productModal');
    const productForm = document.getElementById('productForm');
    const productMethod = document.getElementById('productMethod');
    const productModalTitle = document.getElementById('productModalTitle');
    const productSubmitBtn = document.getElementById('productSubmitBtn');

    function openProductModal(mode, id = null, categoryId = '', name = '', price = '', stock = '', desc = '', weight = '') {
        productModal.classList.remove('hidden');

        if (mode === 'edit') {
            productModalTitle.innerText = 'Edit Produk';
            productSubmitBtn.innerText = 'Simpan Perubahan';
            productForm.action = `/product/${id}`;
            productMethod.value = 'PUT';
            document.getElementById('prodCategory').value = categoryId;
            document.getElementById('prodName').value = name;
            document.getElementById('prodPrice').value = price;
            document.getElementById('prodStock').value = stock;
            document.getElementById('prodDesc').value = desc;
            document.getElementById('prodWeight').value = weight;
        } else {
            productModalTitle.innerText = 'Tambah Produk';
            productSubmitBtn.innerText = 'Tambah Produk';
            productForm.action = "{{ route('product.store') }}";
            productMethod.value = 'POST';
            productForm.reset();
        }
    }

    function closeProductModal() {
        productModal.classList.add('hidden');
    }

    @if($errors->any())
        openProductModal('add');
    @endif
</script>
@endsection
