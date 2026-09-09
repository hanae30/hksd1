@extends('dashboard.sidebar')
@section('content')
<main class="flex-1 p-6 md:p-10 overflow-y-auto">
    <div class="max-w-6xl mx-auto">

        <div class="mb-6">
            <h1 class="text-xl font-bold text-white tracking-wide">Category</h1>
            <p class="text-xs text-zinc-400 mt-0.5">Kelola kategori produk POSMart</p>
        </div>

        @if(session('success'))
            <div class="mb-4 text-xs text-green-400 bg-green-500/10 border border-green-500/20 px-3 py-2 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-4 text-xs text-red-400 bg-red-500/10 border border-red-500/20 px-3 py-2 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
            <div class="bg-[#121214] p-5 rounded-2xl border border-zinc-800/80 shadow-sm">
                <p class="text-[11px] font-semibold text-zinc-400 uppercase tracking-wider mb-2">Total Kategori</p>
                <p class="text-2xl font-black text-white tracking-tight">{{ $totalKategori }}</p>
            </div>
        </div>

        <div class="bg-[#121214] rounded-2xl border border-zinc-800/80 shadow-sm overflow-hidden">
            <div class="px-5 py-4 border-b border-zinc-800/80 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4">
                <h3 class="font-bold text-white text-sm shrink-0">Daftar Kategori</h3>

                <div class="flex items-center gap-3 flex-1 justify-end">
                    <form method="GET" class="relative flex-1 max-w-xs">
                        <i data-lucide="search" class="absolute left-3 top-2.5 w-3.5 h-3.5 text-zinc-500"></i>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kategori..."
                            class="w-full bg-zinc-900/60 border border-zinc-700/60 rounded-lg pl-8 pr-3 py-1.5 text-xs text-white focus:outline-none focus:border-red-600 transition-colors" />
                    </form>

                    <button type="button" onclick="openCategoryModal('add')"
                        class="px-4 py-2 bg-red-600 hover:bg-red-500 text-white text-xs font-bold rounded-xl transition-all shadow-md shadow-red-900/30 cursor-pointer active:scale-95 shrink-0">
                        + Tambah Kategori
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-xs">
                    <thead>
                        <tr class="border-b border-zinc-800/80 text-zinc-500 uppercase tracking-wider">
                            <th class="text-left px-5 py-3 font-semibold">Nama Kategori</th>
                            <th class="text-right px-5 py-3 font-semibold">Jumlah Produk</th>
                            <th class="text-right px-5 py-3 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/60">
                        @forelse($categories as $category)
                            <tr class="hover:bg-zinc-800/30 transition-colors">
                                <td class="px-5 py-3 font-medium text-white">{{ $category->name }}</td>
                                <td class="px-5 py-3 text-right font-mono text-zinc-200">{{ $category->products_count }}</td>
                                <td class="px-5 py-3 text-right">
                                    <button type="button"
                                        onclick="openCategoryModal('edit', {{ $category->id }}, '{{ $category->name }}')"
                                        class="text-zinc-400 hover:text-white text-xs mr-3 cursor-pointer">Edit</button>
                                    <form action="{{ route('category.destroy', $category) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Yakin mau hapus kategori ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400 text-xs cursor-pointer">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-12 text-center text-zinc-500">Belum ada kategori.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($categories->hasPages())
                <div class="px-5 py-4 border-t border-zinc-800/80">
                    {{ $categories->links() }}
                </div>
            @endif
        </div>
    </div>
</main>

{{-- Modal Tambah/Edit Kategori --}}
<div id="categoryModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 hidden">
    <div class="absolute inset-0" onclick="closeCategoryModal()"></div>

    <div class="relative bg-zinc-900 border border-zinc-800 rounded-2xl w-full max-w-sm z-10 shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-zinc-800">
            <h3 id="categoryModalTitle" class="font-bold text-white text-sm">Tambah Kategori</h3>
            <button type="button" onclick="closeCategoryModal()" class="text-zinc-500 hover:text-white cursor-pointer">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <form id="categoryForm" method="POST" class="p-5 space-y-4">
            @csrf
            <input type="hidden" name="_method" id="categoryMethod" value="POST">

            @if($errors->any())
                <div class="text-xs text-red-400 bg-red-500/10 border border-red-500/20 px-3 py-2 rounded-lg">
                    <ul class="list-disc list-inside space-y-0.5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="space-y-1">
                <label class="text-xs font-semibold text-zinc-400">Nama Kategori</label>
                <input type="text" name="name" id="categoryName" required
                    class="w-full bg-zinc-800 border border-zinc-700 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-red-600 text-white" />
            </div>

            <button type="submit" id="categorySubmitBtn"
                class="w-full mt-2 py-2.5 bg-red-600 hover:bg-red-500 text-white font-bold text-xs rounded-xl transition-colors cursor-pointer shadow-md shadow-red-900/30">
                Tambah Kategori
            </button>
        </form>
    </div>
</div>

<script>
    const categoryModal = document.getElementById('categoryModal');
    const categoryForm = document.getElementById('categoryForm');
    const categoryName = document.getElementById('categoryName');
    const categoryMethod = document.getElementById('categoryMethod');
    const categoryModalTitle = document.getElementById('categoryModalTitle');
    const categorySubmitBtn = document.getElementById('categorySubmitBtn');

    function openCategoryModal(mode = 'add', id = null, name = '') {
        categoryModal.classList.remove('hidden');

        if (mode === 'edit') {
            categoryModalTitle.innerText = 'Edit Kategori';
            categorySubmitBtn.innerText = 'Simpan Perubahan';
            categoryForm.action = `/category/${id}`;
            categoryMethod.value = 'PUT';
            categoryName.value = name;
        } else {
            categoryModalTitle.innerText = 'Tambah Kategori';
            categorySubmitBtn.innerText = 'Tambah Kategori';
            categoryForm.action = "{{ route('category.store') }}";
            categoryMethod.value = 'POST';
            categoryName.value = '';
        }
    }

    function closeCategoryModal() {
        categoryModal.classList.add('hidden');
    }

    @if($errors->any())
        openCategoryModal('add');
    @endif
</script>
@endsection
