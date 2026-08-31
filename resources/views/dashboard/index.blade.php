<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - HKSD Admin Panel</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #000000;
            color: #ffffff;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar Merah Gelap */
        .sidebar {
            width: 280px;
            background-color: #990000;
            display: flex;
            flex-direction: column;
            padding: 24px 20px;
            gap: 30px;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .avatar-box {
            width: 44px;
            height: 44px;
            background-color: #1a1a1a;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .avatar-box svg {
            width: 24px;
            height: 24px;
            fill: #ffffff;
        }

        .admin-info h3 {
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .admin-info p {
            font-size: 12px;
            color: #ffcccc;
            margin-top: 2px;
        }

        /* Menu Navigasi */
        .menu-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        button.menu-item.logout {
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            font-family: inherit;
        }

        button.menu-item.logout:hover {
            background-color: rgba(0, 0, 0, 0.15);
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 16px;
            border-radius: 10px;
            text-decoration: none;
            color: #ffffff;
            font-size: 15px;
            font-weight: 500;
            transition: background 0.2s;
        }

        .menu-item svg {
            width: 20px;
            height: 20px;
            fill: #ffffff;
        }

        .menu-item.active {
            background-color: #1a1a1a;
            border: 1px solid #333333;
        }

        .menu-item:hover:not(.active) {
            background-color: rgba(0, 0, 0, 0.15);
        }

        /* Main Content Area */
        .main-content {
            flex: 1;
            background-color: #000000;
            padding: 40px;
            overflow-y: auto;
        }

        h1.page-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 25px;
            color: #ffffff;
        }

        /* Top Metrics Row */
        .metrics-row {
            display: flex;
            gap: 24px;
            margin-bottom: 30px;
        }

        .metric-card {
            background-color: #141414;
            border: 1px solid #262626;
            border-radius: 10px;
            padding: 20px 24px;
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        .metric-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background-color: #ff0000;
        }

        .metric-title {
            font-size: 14px;
            color: #cccccc;
            margin-bottom: 12px;
        }

        .metric-value-row {
            display: flex;
            align-items: baseline;
            gap: 12px;
        }

        .metric-number {
            font-size: 22px;
            font-weight: 700;
            color: #ffffff;
        }

        .metric-status {
            font-size: 14px;
            color: #ff3333;
            font-weight: 600;
        }

        /* Chart Section */
        .chart-panel {
            background-color: #141414;
            border: 1px solid #262626;
            border-radius: 10px;
            padding: 24px;
        }

        .chart-title {
            font-size: 16px;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 30px;
        }

        .chart-bars-container {
            display: flex;
            align-items: flex-end;
            justify-content: space-around;
            height: 200px;
            padding: 0 20px;
        }

        .bar {
            width: 38px;
            background: linear-gradient(to top, #990000, #ff3333);
            border-radius: 4px 4px 0 0;
        }
    </style>
</head>

<body>

    <!-- Sidebar Merah -->
    <aside class="sidebar">
        <div class="admin-profile">
            <div class="avatar-box">
                <!-- User Icon SVG -->
                <svg viewBox="0 0 24 24">
                    <path
                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                </svg>
            </div>
            <div class="admin-info">
                <h3>HKSD</h3>
                <p>Admin panel</p>
            </div>
        </div>

        <nav class="menu-list">
            <a href="#" class="menu-item active">
                <svg viewBox="0 0 24 24">
                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                </svg>
                <span>Dashboard</span>
            </a>
            <a href="#" class="menu-item">
                <svg viewBox="0 0 24 24">
                    <path
                        d="M20 6h-4V4c0-1.1-.9-2-2-2h-4c-1.1 0-2 .9-2 2v2H4c-1.1 0-2 .9-2 2v11c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zM10 4h4v2h-4V4zm10 15H4V8h16v11z" />
                </svg>
                <span>Produk</span>
            </a>
            <a href="#" class="menu-item">
                <svg viewBox="0 0 24 24">
                    <path
                        d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                </svg>
                <span>Pesanan</span>
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="menu-item logout">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z" />
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <h1 class="page-title">Dashboard</h1>

        <!-- Metrics Cards -->
        <div class="metrics-row">
            <div class="metric-card">
                <div class="metric-title">Total Pesanan</div>
                <div class="metric-value-row">
                    <span class="metric-number">324</span>
                </div>
            </div>

            <div class="metric-card">
                <div class="metric-title">Stok Menipis</div>
                <div class="metric-value-row">
                    <span class="metric-number">5 Produk</span>
                    <span class="metric-status">Perlu Restok</span>
                </div>
            </div>
        </div>

        <!-- Grafik Penjualan -->
        <div class="chart-panel">
            <div class="chart-title">Grafik Penjualan Minggu Ini</div>
            <div class="chart-bars-container">
                <div class="bar" style="height: 40%;"></div>
                <div class="bar" style="height: 65%;"></div>
                <div class="bar" style="height: 30%;"></div>
                <div class="bar" style="height: 75%;"></div>
                <div class="bar" style="height: 90%;"></div>
                <div class="bar" style="height: 70%;"></div>
                <div class="bar" style="height: 60%;"></div>
            </div>
        </div>
    </main>

</body>

</html>
