@extends('dashboard.sidebar')
@section('content')
    <main class="flex-1 p-6 md:p-10 overflow-y-auto">
        <div class="max-w-6xl mx-auto">

            <div class="mb-6">
                <h1 class="text-xl font-bold text-white tracking-wide">Product</h1>
                <p class="text-xs text-zinc-400 mt-0.5">Kelola daftar produk POSMart</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                <div class="bg-[#121214] p-5 rounded-2xl border border-zinc-800/80 shadow-sm relative overflow-hidden">
                    <p class="text-[11px] font-semibold text-zinc-400 uppercase tracking-wider mb-2">Total Produk</p>
                    <p id="total-produk" class="text-2xl font-black text-white tracking-tight">0</p>
                </div>

                <div class="bg-[#121214] p-5 rounded-2xl border border-zinc-800/80 shadow-sm relative overflow-hidden">
                    <p class="text-[11px] font-semibold text-zinc-400 uppercase tracking-wider mb-2">Stok Menipis</p>
                    <div class="flex items-baseline gap-2">
                        <p id="stok-menipis" class="text-2xl font-black text-red-500 tracking-tight">0</p>
                        <span id="badge-restock"
                            class="hidden text-[10px] font-bold text-red-400 bg-red-950/40 px-2 py-0.5 rounded-md border border-red-900/50">
                            Perlu Restock
                        </span>
                    </div>
                </div>

                <div class="bg-[#121214] p-5 rounded-2xl border border-zinc-800/80 shadow-sm relative overflow-hidden">
                    <p class="text-[11px] font-semibold text-zinc-400 uppercase tracking-wider mb-2">Produk Promo</p>
                    <p id="produk-promo" class="text-2xl font-black text-white tracking-tight">0</p>
                </div>
            </div>

            <div class="bg-[#121214] rounded-2xl border border-zinc-800/80 shadow-sm overflow-hidden">
                <div
                    class="px-5 py-4 border-b border-zinc-800/80 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4">
                    <h3 class="font-bold text-white text-sm shrink-0">Daftar Produk</h3>

                    <div class="flex items-center gap-3 flex-1 justify-end">
                        <div class="relative flex-1 max-w-xs">
                            <i data-lucide="search" class="absolute left-3 top-2.5 w-3.5 h-3.5 text-zinc-500"></i>
                            <input type="text" id="search-input" placeholder="Cari produk..."
                                class="w-full bg-zinc-900/60 border border-zinc-700/60 rounded-lg pl-8 pr-3 py-1.5 text-xs text-white focus:outline-none focus:border-red-600 transition-colors" />
                        </div>

                        <a href="{{ route('product.create') }}"
                            class="px-4 py-2 bg-red-600 hover:bg-red-500 text-white text-xs font-bold rounded-xl transition-all shadow-md shadow-red-900/30 cursor-pointer active:scale-95 shrink-0 inline-block">
                            + Tambah Produk
                        </a>
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
                        <tbody id="product-table-body" class="divide-y divide-zinc-800/60">
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
@endsection
