@extends('dashboard.sidebar')
@section('content')
<main class="flex-1 p-6 md:p-10 overflow-y-auto">
    <div class="max-w-md mx-auto">

        <div class="mb-6">
            <h1 class="text-xl font-bold text-white tracking-wide">Tambah Produk Baru</h1>
            <p class="text-xs text-zinc-400 mt-0.5">Isi data produk untuk ditambahkan ke inventaris</p>
        </div>

        <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-5">
            @if ($errors->any())
                <div class="mb-4 text-xs text-red-400 bg-red-500/10 border border-red-500/20 px-3 py-2 rounded-lg">
                    <ul class="list-disc list-inside space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div class="space-y-1">
                    <label class="text-xs font-semibold text-zinc-400">Gambar Produk</label>
                    <div id="dropZone"
                         class="flex flex-col items-center justify-center gap-2 border-2 border-dashed border-zinc-700 hover:border-red-600 rounded-lg py-6 cursor-pointer transition-colors">
                        <div id="uploadPlaceholder" class="flex flex-col items-center pointer-events-none">
                            <i data-lucide="upload" class="w-6 h-6 text-zinc-500 mb-1"></i>
                            <span class="text-xs text-zinc-500">Klik atau seret gambar ke sini</span>
                        </div>
                        <img id="imagePreview" class="hidden w-20 h-20 object-cover rounded-lg pointer-events-none" />
                        <span id="fileNameDisplay" class="text-xs text-zinc-400 font-medium"></span>
                        <input type="file" name="image" id="imageInput" accept="image/*" class="hidden" />
                    </div>
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-semibold text-zinc-400">Nama Produk</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full bg-zinc-800 border border-zinc-700 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-red-600 text-white" />
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-zinc-400">Kategori</label>
                        <select name="category" class="w-full bg-zinc-800 border border-zinc-700 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-red-600 text-white">
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Snack">Snack</option>
                        </select>
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-zinc-400">Harga (Rp)</label>
                        <input type="number" name="price" value="{{ old('price') }}" required min="0"
                            class="w-full bg-zinc-800 border border-zinc-700 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-red-600 text-white" />
                    </div>
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-semibold text-zinc-400">Stok</label>
                    <input type="number" name="stock" value="{{ old('stock') }}" required min="0"
                        class="w-full bg-zinc-800 border border-zinc-700 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-red-600 text-white" />
                </div>

                <div class="flex items-center gap-2 pt-1">
                    <input type="checkbox" name="is_promo" id="prodIsPromo" value="1"
                        class="w-4 h-4 accent-red-600 cursor-pointer" />
                    <label for="prodIsPromo" class="text-xs text-zinc-300 cursor-pointer">Produk sedang promo</label>
                </div>

                <div class="flex gap-3 pt-2">
                    <a href="{{ route('product.index') }}"
                        class="flex-1 py-2.5 text-center bg-zinc-800 hover:bg-zinc-700 text-white font-bold text-xs rounded-xl transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="flex-1 py-2.5 bg-red-600 hover:bg-red-500 text-white font-bold text-xs rounded-xl transition-colors shadow-md shadow-red-900/30">
                        Tambah Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    const dropZone = document.getElementById('dropZone');
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    const uploadPlaceholder = document.getElementById('uploadPlaceholder');
    const fileNameDisplay = document.getElementById('fileNameDisplay');

    dropZone.addEventListener('click', () => imageInput.click());

    function handleFileSelect(file) {
        if (!file) return;
        if (!file.type.startsWith('image/')) {
            alert('File harus berupa gambar.');
            return;
        }
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran gambar maksimal 2MB.');
            return;
        }
        const dt = new DataTransfer();
        dt.items.add(file);
        imageInput.files = dt.files;

        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.src = e.target.result;
            imagePreview.classList.remove('hidden');
            uploadPlaceholder.classList.add('hidden');
            fileNameDisplay.innerText = file.name;
        };
        reader.readAsDataURL(file);
    }

    imageInput.addEventListener('change', () => handleFileSelect(imageInput.files[0]));

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, (e) => {
            e.preventDefault();
            dropZone.classList.add('border-red-500', 'bg-red-500/5');
        });
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-red-500', 'bg-red-500/5');
        });
    });

    dropZone.addEventListener('drop', (e) => {
        handleFileSelect(e.dataTransfer.files[0]);
    });
</script>
@endsection
