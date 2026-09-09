<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Saya - Hana Kita shop Depok</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #0d0d0d;
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        header {
            background-color: #121212;
            border-bottom: 1px solid #222;
            padding: 12px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .logo-box {
            background: #b91c1c;
            color: white;
            font-weight: 900;
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 15px;
            letter-spacing: 0.5px;
            border: 2px solid #ef4444;
            display: flex;
            flex-direction: column;
            align-items: center;
            line-height: 1.1;
        }

        .logo-box span {
            font-size: 8px;
            letter-spacing: 0px;
        }

        .store-info .store-name {
            font-size: 14px;
            font-weight: bold;
            color: #fff;
        }

        .store-info .store-loc {
            font-size: 11px;
            color: #aaa;
        }

        .nav-divider {
            width: 1px;
            height: 24px;
            background-color: #333;
        }

        .cart-title-nav {
            font-size: 18px;
            font-weight: bold;
            color: #fff;
        }

        .nav-center {
            flex: 1;
            max-width: 400px;
            margin: 0 30px;
        }

        .search-bar {
            background: #181818;
            border: 1px solid #333;
            border-radius: 4px;
            display: flex;
            align-items: center;
            padding: 7px 12px;
            color: #777;
            font-size: 13px;
        }

        .search-bar i {
            margin-right: 8px;
            color: #666;
        }

        .search-bar input {
            background: transparent;
            border: none;
            color: white;
            width: 100%;
            outline: none;
            font-size: 13px;
        }

        .nav-right {
            display: flex;
            align-items: center;
        }

        .user-icon-btn {
            background: #dc2626;
            color: white;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            cursor: pointer;
        }

        /* Container */
        .container {
            max-width: 1150px;
            margin: 25px auto;
            padding: 0 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%;
        }

        .top-action-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 5px;
        }

        .btn-back {
            background: #dc2626;
            color: white;
            border: none;
            padding: 6px 20px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 13px;
            cursor: pointer;
            text-decoration: none;
        }

        /* Cart Table Header */
        .cart-header {
            background: #161616;
            border: 1px solid #282828;
            border-radius: 6px;
            padding: 14px 20px;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 60px;
            align-items: center;
            font-size: 14px;
            font-weight: bold;
            color: #fff;
        }

        .header-col-1 {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-col-2 {
            text-align: center;
        }

        .header-col-3 {
            text-align: center;
        }

        .header-col-4 {
            text-align: right;
        }

        .header-col-5 {
            text-align: right;
        }

        /* Custom Checkbox */
        .custom-checkbox {
            width: 16px;
            height: 16px;
            accent-color: #dc2626;
            cursor: pointer;
            background: #222;
            border: 1px solid #444;
        }

        /* Cart Item Card */
        .cart-item {
            background: #161616;
            border: 1px solid #282828;
            border-radius: 6px;
            padding: 20px;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 60px;
            align-items: center;
        }

        .item-product-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .item-img {
            width: 85px;
            height: 85px;
            background: #222;
            border-radius: 4px;
            overflow: hidden;
            flex-shrink: 0;
            border: 1px solid #333;
        }

        .item-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-details {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .item-name {
            font-size: 14px;
            font-weight: bold;
            color: #fff;
            line-height: 1.3;
        }

        .item-variant-select {
            background: #111;
            border: 1px solid #333;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 12px;
            outline: none;
            cursor: pointer;
            width: fit-content;
        }

        .item-price {
            font-size: 14px;
            font-weight: bold;
            color: #fff;
            text-align: center;
        }

        .item-qty-control {
            display: flex;
            justify-content: center;
        }

        .qty-selector {
            display: flex;
            align-items: center;
            background: #1c1c1c;
            border: 1px solid #333;
            border-radius: 4px;
            overflow: hidden;
        }

        .qty-btn {
            background: #262626;
            color: #fff;
            border: none;
            width: 28px;
            height: 30px;
            font-size: 13px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qty-input {
            width: 32px;
            text-align: center;
            background: transparent;
            border: none;
            color: white;
            font-weight: bold;
            font-size: 13px;
        }

        .item-total {
            font-size: 14px;
            font-weight: bold;
            color: #fff;
            text-align: right;
        }

        .item-action {
            display: flex;
            justify-content: flex-end;
        }

        .btn-delete {
            background: transparent;
            border: none;
            color: #ef4444;
            font-size: 16px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-delete:hover {
            color: #dc2626;
        }

        /* Cart Footer / Checkout Bar */
        .cart-checkout-bar {
            background: #161616;
            border: 1px solid #282828;
            border-radius: 6px;
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 5px;
        }

        .select-all-box {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 14px;
            color: #fff;
        }

        .select-all-box span {
            font-size: 12px;
            color: #888;
            display: block;
        }

        .checkout-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .total-summary {
            font-size: 15px;
            font-weight: bold;
            color: #fff;
        }

        .total-summary span {
            color: #fff;
        }

        .btn-checkout {
            background: #dc2626;
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-checkout:hover {
            background: #b91c1c;
        }

        /* Footer */
        footer {
            background-color: #080808;
            border-top: 1px solid #222;
            padding: 16px 24px;
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: auto;
        }
    </style>
</head>

<body>

    <!-- Header / Navbar -->
    <header>
        <div class="nav-left">
            <div class="logo-box">
                HKSD
                <span>Hana Kite Shop Depok</span>
            </div>
            <div class="store-info">
                <div class="store-name">Hana Kita shop</div>
                <div class="store-loc">Depok</div>
            </div>
            <div class="nav-divider"></div>
            <div class="cart-title-nav">Keranjang Saya</div>
        </div>
        <div class="nav-center">
            <div class="search-bar">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Cari perlengkapan layanan anda...">
            </div>
        </div>
        <div class="nav-right">
            <button class="user-icon-btn"><i class="fa-solid fa-user"></i></button>
        </div>
    </header>

    <!-- Main Container -->
    <div class="container">

        <div class="top-action-bar">
            <button class="btn-back">Kembali</button>
        </div>

        <!-- Table Header -->
        <div class="cart-header">
            <div class="header-col-1">
                <input type="checkbox" class="custom-checkbox" checked>
                <span>Produk</span>
            </div>
            <div class="header-col-2">Harga Satuan</div>
            <div class="header-col-3">Kuantitas</div>
            <div class="header-col-4">Total Harga</div>
            <div class="header-col-5">Aksi</div>
        </div>

        <!-- Cart Item -->
        <div class="cart-item">
            <div class="item-product-info">
                <input type="checkbox" class="custom-checkbox" checked>
                <div class="item-img">
                    <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&q=80&w=200"
                        alt="Gelasan Venom Combat">
                </div>
                <div class="item-details">
                    <div class="item-name">Gelasan Venom Combat by<br>Warok Kite</div>
                    <select class="item-variant-select">
                        <option>Warna Benang : Merah Bata</option>
                    </select>
                </div>
            </div>
            <div class="item-price">Rp 40.000</div>
            <div class="item-qty-control">
                <div class="qty-selector">
                    <button class="qty-btn">-</button>
                    <input type="text" class="qty-input" value="2">
                    <button class="qty-btn">+</button>
                </div>
            </div>
            <div class="item-total">Rp 80.000</div>
            <div class="item-action">
                <button class="btn-delete"><i class="fa-solid fa-trash-can"></i></button>
            </div>
        </div>

        <!-- Checkout Bar -->
        <div class="cart-checkout-bar">
            <div class="select-all-box">
                <input type="checkbox" class="custom-checkbox" checked>
                <div>
                    Pilih semua
                    <span>(1)</span>
                </div>
            </div>
            <div class="checkout-right">
                <div class="total-summary">
                    Total (1 Produk) : <span>Rp 80.000</span>
                </div>
                <a href="/bayar">
                    <button class="btn-checkout">
                        Checkout
                    </button>
                </a>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer>
        <div>&copy; 2026 Hana Kite Shop Depok. All rights reserved.</div>
    </footer>

</body>

</html>
