@extends('dashboard.sidebar')
@section('content')
    <main class="flex-1 p-6 md:p-10 overflow-y-auto">
        <div class="max-w-7xl mx-auto space-y-6">

            <div class="flex items-center gap-4">
                <div class="flex-1 flex items-center gap-2 bg-[#140406] border border-red-950/60 rounded-2xl px-4 py-2.5">
                    <i data-lucide="search" class="w-4 h-4 text-zinc-500"></i>
                    <input type="text" placeholder="Search"
                        class="bg-transparent outline-none text-sm text-zinc-300 placeholder-zinc-600 w-full" />
                </div>
                <button
                    class="p-2.5 bg-[#140406] border border-red-950/60 rounded-2xl text-zinc-400 hover:text-zinc-200 transition-colors cursor-pointer">
                    <i data-lucide="bell" class="w-4 h-4"></i>
                </button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-[#140406] border border-red-950/60 rounded-2xl p-5">
                    <div class="flex items-center gap-2 text-zinc-500 mb-3">
                        <i data-lucide="dollar-sign" class="w-4 h-4"></i>
                        <span class="text-xs font-semibold uppercase tracking-widest">Total Sales</span>
                    </div>
                    <p class="text-2xl font-black text-white mb-2">1K</p>
                    <span
                        class="inline-block text-xs font-bold px-2 py-0.5 rounded-full bg-emerald-950/50 text-emerald-400">
                        +20% Vs last month
                    </span>
                </div>

                <div class="bg-[#140406] border border-red-950/60 rounded-2xl p-5">
                    <div class="flex items-center gap-2 text-zinc-500 mb-3">
                        <i data-lucide="wallet" class="w-4 h-4"></i>
                        <span class="text-xs font-semibold uppercase tracking-widest">Saldo Balance</span>
                    </div>
                    <p class="text-2xl font-black text-white mb-2">5K</p>
                    <span
                        class="inline-block text-xs font-bold px-2 py-0.5 rounded-full bg-emerald-950/50 text-emerald-400">
                        +4% Vs last month
                    </span>
                </div>

                <div class="bg-[#140406] border border-red-950/60 rounded-2xl p-5">
                    <div class="flex items-center gap-2 text-zinc-500 mb-3">
                        <i data-lucide="percent" class="w-4 h-4"></i>
                        <span class="text-xs font-semibold uppercase tracking-widest">Bounce Rate</span>
                    </div>
                    <p class="text-2xl font-black text-white mb-2">54%</p>
                    <span class="inline-block text-xs font-bold px-2 py-0.5 rounded-full bg-rose-950/50 text-rose-400">
                        -1.59% Vs last month
                    </span>
                </div>

                <div class="bg-[#140406] border border-red-950/60 rounded-2xl p-5">
                    <div class="flex items-center gap-2 text-zinc-500 mb-3">
                        <i data-lucide="timer" class="w-4 h-4"></i>
                        <span class="text-xs font-semibold uppercase tracking-widest">Rata-rata Transaksi</span>
                    </div>
                    <p class="text-2xl font-black text-white mb-2">2m 56s</p>
                    <span
                        class="inline-block text-xs font-bold px-2 py-0.5 rounded-full bg-emerald-950/50 text-emerald-400">
                        +7% Vs last month
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div class="lg:col-span-2 bg-[#140406] border border-red-950/60 rounded-2xl p-5">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h3 class="text-white font-bold">Analytics</h3>
                            <p class="text-xs text-zinc-500">Sales 7 hari terakhir</p>
                        </div>
                    </div>
                    <div class="h-72 relative">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>

                <div class="bg-[#140406] border border-red-950/60 rounded-2xl p-5">
                    <h3 class="text-white font-bold">Sales per Kategori</h3>
                    <p class="text-xs text-zinc-500 mb-4">Kontribusi bulan ini</p>
                    <div class="h-72 relative">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
