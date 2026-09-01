<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - HKSD Hana Kite Shop Depok</title>
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
                            /* Background kartu login */
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
            <a href="/" class="text-sm text-gray-400 hover:text-white transition flex items-center gap-2">
                <i class="fa-solid fa-arrow-left text-xs"></i> Kembali ke Beranda
            </a>
        </div>
    </header>

    <!-- LOGIN CONTAINER -->
    <main class="flex-1 flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-brand-card border border-brand-border rounded-2xl p-6 sm:p-8 shadow-2xl">

            <!-- Card Header -->
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-white tracking-wide">Selamat Datang Kembali</h1>
                <p class="text-xs text-gray-400 mt-1">Masuk ke akun HKSD Anda untuk melanjutkan belanja</p>
            </div>

            <!-- Form -->
            <form action="{{ route('login') }}" method="POST" class="space-y-5">

                <!-- Input Email / No HP -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-gray-300 mb-2">Email atau Nomor
                        Whatsapp</label>
                    <div class="relative">
                        <input type="email" name="email" value="{{ old('email') }}" required
                            placeholder="contoh: user@gmail.com"
                            class="w-full bg-brand-bg text-gray-200 placeholder-gray-500 pl-10 pr-4 py-2.5 rounded-lg border border-brand-border focus:outline-none focus:border-brand-red text-sm transition
                            @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <i class="fa-solid fa-envelope absolute left-3.5 top-3.5 text-gray-500 text-xs"></i>
                    </div>
                </div>

                <!-- Input Password -->
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="text-xs font-semibold text-gray-300">Kata Sandi</label>
                        <a href="#" class="text-xs text-brand-red hover:underline">Lupa kata sandi?</a>
                    </div>
                    <div class="relative">
                        <input type="password" name="password" required placeholder="Masukkan kata sandi"
                            class="w-full bg-brand-bg text-gray-200 placeholder-gray-500 pl-10 pr-4 py-2.5 rounded-lg border border-brand-border focus:outline-none focus:border-brand-red text-sm transition
                            @error('password') is-invalid @enderror"
                            required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <i class="fa-solid fa-lock absolute left-3.5 top-3.5 text-gray-500 text-xs"></i>
                    </div>
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center">
                    <input type="checkbox" id="remember"
                        class="w-4 h-4 rounded bg-brand-bg border-brand-border text-brand-red focus:ring-brand-red focus:ring-offset-brand-card">
                    <label for="remember" class="ml-2 text-xs text-gray-400 select-none">Ingat saya di perangkat
                        ini</label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-brand-red hover:bg-brand-redHover text-white font-semibold py-2.5 rounded-lg text-sm transition shadow-lg shadow-brand-red/20 mt-2">
                    Masuk
                </button>

            </form>

            <!-- Divider -->
            <div class="relative my-6 text-center">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-brand-border"></div>
                </div>
                <span class="relative bg-brand-card px-3 text-xs text-gray-500">atau masuk dengan</span>
            </div>

            <!-- Social Login -->
            <button
                class="w-full bg-brand-bg border border-brand-border hover:border-gray-500 text-gray-300 font-medium py-2.5 rounded-lg text-sm transition flex items-center justify-center gap-2">
                <i class="fa-brands fa-google text-red-500"></i>
                <span>Google</span>
            </button>

            <!-- Footer Register Link -->
            <p class="text-center text-xs text-gray-400 mt-8">
                Belum punya akun?
                <a href="/user" class="text-brand-red font-semibold hover:underline">Daftar Sekarang</a>
            </p>

        </div>
    </main>

    <!-- FOOTER SIMPLE -->
    <footer class="bg-brand-nav border-t border-brand-border py-4 text-center text-xs text-gray-500">
        <p>&copy; 2026 Hana Kite Shop Depok. All rights reserved.</p>
    </footer>

</body>

</html>
