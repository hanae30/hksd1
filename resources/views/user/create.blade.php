<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - HKSD Hana Kite Shop Depok</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            red: '#E50914',
                            /* Merah utama */
                            redHover: '#B81D24',
                            /* Merah saat di-hover */
                            bg: '#121212',
                            /* Background utama (Dark Charcoal) */
                            card: '#1E1E1E',
                            /* Background kartu register */
                            nav: '#0A0A0A',
                            /* Background header/footer */
                            border: '#2A2A2A' /* Garis batas halus */
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-brand-bg text-gray-200 font-sans min-h-screen flex flex-col justify-between">

    <!-- HEADER SIMPLE -->
    <header class="bg-brand-nav border-b border-brand-border py-4 px-6">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <a href="homepage.html" class="flex items-center gap-2 cursor-pointer">
                <div class="bg-brand-red text-white font-black px-3 py-1 rounded tracking-wider text-xl">
                    HKSD
                </div>
                <div class="hidden sm:block text-xs leading-tight">
                    <span class="block font-bold text-white">Hana Kite Shop</span>
                    <span class="text-gray-400">Depok</span>
                </div>
            </a>
            <a href="homepage.html" class="text-sm text-gray-400 hover:text-white transition flex items-center gap-2">
                <i class="fa-solid fa-arrow-left text-xs"></i> Kembali ke Beranda
            </a>
        </div>
    </header>

    <!-- REGISTER CONTAINER -->
    <main class="flex-1 flex items-center justify-center p-4 py-8">
        <div class="w-full max-w-md bg-brand-card border border-brand-border rounded-2xl p-6 sm:p-8 shadow-2xl my-auto">

            <!-- Card Header -->
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-white tracking-wide">Buat Akun Baru</h1>
                <p class="text-xs text-gray-400 mt-1">Bergabung dengan HKSD untuk kemudahan bertransaksi</p>
            </div>

            <!-- Form -->
            <form action="{{ route('user.store') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Input Nama Lengkap -->
                <div>
                    <label for="fullname" class="block text-xs font-semibold text-gray-300 mb-1.5">Nama Lengkap</label>
                    <div class="relative">
                        <input type="text" id="fullname" name="name" placeholder="Contoh: Budi Santoso"
                            value="{{ old('name') }}"
                            class="w-full bg-brand-bg text-gray-200 placeholder-gray-500 pl-10 pr-4 py-2.5 rounded-lg border border-brand-border focus:outline-none focus:border-brand-red text-sm transition">
                        <i class="fa-solid fa-user absolute left-3.5 top-3.5 text-gray-500 text-xs"></i>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Input Email-->
                <div>
                    <label for="contact" class="block text-xs font-semibold text-gray-300 mb-1.5">Email</label>
                    <div class="relative">
                        <input type="email" id="contact" placeholder="user@gmail.com" name="email" required
                            class="w-full bg-brand-bg text-gray-200 placeholder-gray-500 pl-10 pr-4 py-2.5 rounded-lg border border-brand-border focus:outline-none focus:border-brand-red text-sm transition">
                        <i class="fa-solid fa-envelope absolute left-3.5 top-3.5 text-gray-500 text-xs"></i>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Input Password -->
                <div>
                    <label for="password" class="block text-xs font-semibold text-gray-300 mb-1.5">Kata Sandi</label>
                    <div class="relative">
                        <input type="password" id="password" placeholder="Minimal 8 karakter" name="password" required
                            class="w-full bg-brand-bg text-gray-200 placeholder-gray-500 pl-10 pr-4 py-2.5 rounded-lg border border-brand-border focus:outline-none focus:border-brand-red text-sm transition">
                        <i class="fa-solid fa-lock absolute left-3.5 top-3.5 text-gray-500 text-xs"></i>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Input Konfirmasi Password -->
                <div>
                    <label for="phone" class="block text-xs font-semibold text-gray-300 mb-1.5">Nomor Telepon</label>
                    <div class="relative">
                        <input type="tel" id="phone" name="phone" required
                            placeholder="Masukkan nomor telepon"
                            class="w-full bg-brand-bg text-gray-200 placeholder-gray-500 pl-10 pr-4 py-2.5 rounded-lg border border-brand-border focus:outline-none focus:border-brand-red text-sm transition">
                        <i class="fa-solid fa-phone absolute left-3.5 top-3.5 text-gray-500 text-xs"></i>
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="address" class="block text-xs font-semibold text-gray-300 mb-1.5">Alamat
                        Lengkap</label>
                    <div class="relative">
                        <textarea id="address" name="address" rows="3" required placeholder="Masukkan alamat lengkap"
                            class="w-full bg-brand-bg text-gray-200 placeholder-gray-500 pl-10 pr-4 py-2.5 rounded-lg border border-brand-border focus:outline-none focus:border-brand-red text-sm transition resize-none"></textarea>
                        <i class="fa-solid fa-location-dot absolute left-3.5 top-3.5 text-gray-500 text-xs"></i>
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Syarat & Ketentuan Checkbox -->
                <div class="flex items-start pt-1">
                    <input type="checkbox" id="terms" required
                        class="w-4 h-4 mt-0.5 rounded bg-brand-bg border-brand-border text-brand-red focus:ring-brand-red focus:ring-offset-brand-card">
                    <label for="terms" class="ml-2 text-xs text-gray-400 select-none">
                        Saya menyetujui <a href="#" class="text-brand-red hover:underline">Syarat & Ketentuan</a>
                        serta <a href="#" class="text-brand-red hover:underline">Kebijakan Privasi</a> HKSD.
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" id="submit-btn" disabled
                    class="w-full py-2.5 bg-brand-red text-white rounded-lg font-semibold text-sm transition opacity-50 cursor-not-allowed">
                    Daftar Sekarang
                </button>

            </form>

            <!-- Divider -->
            <div class="relative my-5 text-center">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-brand-border"></div>
                </div>
                <span class="relative bg-brand-card px-3 text-xs text-gray-500">atau daftar dengan</span>
            </div>

            <!-- Social Register -->
            <button
                class="w-full bg-brand-bg border border-brand-border hover:border-gray-500 text-gray-300 font-medium py-2.5 rounded-lg text-sm transition flex items-center justify-center gap-2">
                <i class="fa-brands fa-google text-red-500"></i>
                <span>Google</span>
            </button>

            <!-- Footer Login Link -->
            <p class="text-center text-xs text-gray-400 mt-6">
                Sudah punya akun?
                <a href="/login" class="text-brand-red font-semibold hover:underline">Masuk di sini</a>
            </p>

        </div>
    </main>

    <!-- FOOTER SIMPLE -->
    <footer class="bg-brand-nav border-t border-brand-border py-4 text-center text-xs text-gray-500">
        <p>&copy; 2026 Hana Kite Shop Depok. All rights reserved.</p>
    </footer>

    <script>
        const termsCheckbox = document.getElementById('terms');
        const submitBtn = document.getElementById('submit-btn');

        termsCheckbox.addEventListener('change', function() {
            if (this.checked) {
                // Jika dicentang: aktifkan tombol dan hilangkan efek redup
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            } else {
                // Jika tidak dicentang: matikan tombol dan pasang lagi efek redup
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            }
        });
    </script>
</body>

</html>
