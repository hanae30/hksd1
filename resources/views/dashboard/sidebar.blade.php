<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard HKSD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #09090b;
            color: #f4f4f5;
        }
    </style>
</head>

<body class="flex min-h-screen bg-[#09090b]">

    <aside class="w-64 bg-[#0d0d0f] border-r border-zinc-800/80 flex flex-col justify-between hidden md:flex shrink-0">
        <div>
            <div class="p-6 flex items-center gap-3 border-b border-zinc-800/60">
                <div
                    class="w-8 h-8 rounded-lg bg-red-600 flex items-center justify-center text-white font-black shadow-lg shadow-red-900/40">
                    <i data-lucide="store" class="w-4 h-4"></i>
                </div>
                <span class="font-extrabold text-white text-lg tracking-wider">HKSD</span>
            </div>

            <nav class="p-4 space-y-1">
                <a href="/dashboard"
                    class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-medium transition-colors
        {{ request()->is('dashboard') ? 'font-bold bg-red-600 text-white shadow-md shadow-red-900/30' : 'text-zinc-400 hover:bg-zinc-800/40 hover:text-white' }}">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    Dashboard
                </a>

                <a href="/product"
                    class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-medium transition-colors
        {{ request()->is('product*') ? 'font-bold bg-red-600 text-white shadow-md shadow-red-900/30' : 'text-zinc-400 hover:bg-zinc-800/40 hover:text-white' }}">
                    <i data-lucide="box" class="w-4 h-4"></i>
                    PRODUK
                </a>

                <a href="/category"
                    class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-medium transition-colors
        {{ request()->is('purchase*') ? 'font-bold bg-red-600 text-white shadow-md shadow-red-900/30' : 'text-zinc-400 hover:bg-zinc-800/40 hover:text-white' }}">
                    <i data-lucide="shopping-bag" class="w-4 h-4"></i>
                    Kategori
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-medium transition-colors
        {{ request()->is('sales*') ? 'font-bold bg-red-600 text-white shadow-md shadow-red-900/30' : 'text-zinc-400 hover:bg-zinc-800/40 hover:text-white' }}">
                    <i data-lucide="bar-chart-3" class="w-4 h-4"></i>
                    Sales
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-zinc-800/60 space-y-3">
            <div>
                <p class="text-[10px] uppercase font-semibold text-zinc-500 tracking-wider">Masuk Sebagai</p>
                <p class="text-xs font-bold text-white mt-0.5">Admin HKSD</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-xl text-xs font-bold text-red-500 bg-red-950/20 border border-red-900/40 hover:bg-red-950/40 transition-colors cursor-pointer">
                    <i data-lucide="log-out" class="w-3.5 h-3.5"></i>
                    Keluar
                </button>
            </form>
        </div>
    </aside>
    @yield('content')
    <script>
        lucide.createIcons();

        const barChartEl = document.getElementById('barChart');
        if (barChartEl) {
            const barCtx = barChartEl.getContext('2d');
            new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: ['01 Aug', '02 Aug', '03 Aug', '04 Aug', '05 Aug', '06 Aug', '07 Aug'],
                    datasets: [{
                        label: 'Total Penjualan',
                        data: [1200000, 950000, 1600000, 800000, 1400000, 1750000, 2000000],
                        backgroundColor: '#ef4444',
                        borderRadius: 6,
                        maxBarThickness: 32
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: (ctx) => `Rp ${ctx.raw.toLocaleString('id-ID')}`
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#71717a'
                            },
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            ticks: {
                                color: '#71717a',
                                callback: (v) => `Rp ${(v / 1000).toLocaleString('id-ID')}k`
                            },
                            grid: {
                                color: 'rgba(63,63,70,0.4)'
                            }
                        }
                    }
                }
            });
        }

        const pieChartEl = document.getElementById('pieChart');
        if (pieChartEl) {
            const pieCtx = pieChartEl.getContext('2d');
            new Chart(pieCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Makanan', 'Minuman', 'Snack'],
                    datasets: [{
                        data: [4200000, 2600000, 2350000],
                        backgroundColor: ['#ef4444', '#22c55e', '#f97316'],
                        borderColor: '#140406',
                        borderWidth: 3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#a1a1aa',
                                boxWidth: 12,
                                padding: 16
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: (ctx) => `${ctx.label}: Rp ${ctx.raw.toLocaleString('id-ID')}`
                            }
                        }
                    }
                }
            });
        }
    </script>
</body>

</html>
