<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gelasan Venom Combat by Warok Kite - Hana Kita shop Depok</title>
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
            gap: 12px;
        }

        .logo-box {
            background: #b91c1c;
            color: white;
            font-weight: 900;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 16px;
            letter-spacing: 1px;
            border: 2px solid #ef4444;
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

        .nav-center {
            flex: 1;
            max-width: 450px;
            margin: 0 30px;
        }

        .search-bar {
            background: #1e1e1e;
            border: 1px solid #333;
            border-radius: 4px;
            display: flex;
            align-items: center;
            padding: 8px 12px;
            color: #888;
            font-size: 13px;
        }

        .search-bar i {
            margin-right: 8px;
            color: #777;
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
            gap: 20px;
        }

        .cart-icon {
            font-size: 18px;
            color: #ccc;
            cursor: pointer;
        }

        .login-btn {
            background-color: #dc2626;
            color: white;
            border: none;
            padding: 6px 18px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 13px;
            cursor: pointer;
        }

        /* Main Container */
        .container {
            max-width: 1150px;
            margin: 30px auto;
            padding: 0 20px;
            flex: 1;
            display: grid;
            grid-template-columns: 460px 1fr;
            gap: 40px;
        }

        /* Left Column: Gallery */
        .product-gallery {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .main-image {
            width: 100%;
            height: 420px;
            background: #1a1a1a;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #2a2a2a;
            position: relative;
        }

        .main-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .thumbnail-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .thumb {
            height: 85px;
            background: #1a1a1a;
            border-radius: 6px;
            overflow: hidden;
            border: 1px solid #333;
            cursor: pointer;
            opacity: 0.7;
            transition: 0.2s;
        }

        .thumb.active,
        .thumb:hover {
            opacity: 1;
            border-color: #dc2626;
        }

        .thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Related Products Section */
        .related-section {
            margin-top: 20px;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #fff;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .product-card {
            background: #161616;
            border: 1px solid #282828;
            border-radius: 6px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .product-card img {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }

        .card-body {
            padding: 10px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .card-cat {
            font-size: 10px;
            color: #888;
        }

        .card-title {
            font-size: 13px;
            font-weight: bold;
            color: #fff;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 6px;
        }

        .card-price {
            font-size: 13px;
            font-weight: bold;
            color: #ef4444;
        }

        .card-cart-btn {
            background: #dc2626;
            color: white;
            border: none;
            width: 24px;
            height: 24px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            cursor: pointer;
        }

        /* Right Column: Product Details & Actions */
        .product-details {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .product-title {
            font-size: 26px;
            font-weight: 800;
            line-height: 1.2;
            color: #fff;
        }

        .product-badge {
            color: #ef4444;
            font-size: 13px;
            font-weight: 600;
        }

        .product-bullets {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 6px;
            font-size: 13px;
            color: #ccc;
            margin: 4px 0;
        }

        .variant-box {
            display: flex;
            align-items: center;
            background: #161616;
            border: 1px solid #333;
            border-radius: 4px;
            padding: 10px 14px;
            justify-content: space-between;
            font-size: 13px;
            font-weight: 600;
            margin-top: 4px;
        }

        .variant-box i {
            color: #888;
        }

        /* Quantity & Action Buttons */
        .action-row {
            display: flex;
            align-items: center;
            gap: 15px;
            margin: 4px 0;
        }

        .qty-selector {
            display: flex;
            align-items: center;
            background: #161616;
            border: 1px solid #333;
            border-radius: 4px;
            overflow: hidden;
        }

        .qty-btn {
            background: #222;
            color: #fff;
            border: none;
            width: 32px;
            height: 36px;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qty-input {
            width: 40px;
            text-align: center;
            background: transparent;
            border: none;
            color: white;
            font-weight: bold;
            font-size: 13px;
        }

        .btn-cart {
            background: #8b0000;
            color: white;
            border: none;
            flex: 1;
            padding: 10px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-cart:hover {
            background: #a00;
        }

        .btn-buy {
            background: #16a34a;
            color: white;
            border: none;
            flex: 1;
            padding: 10px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-buy:hover {
            background: #15803d;
        }

        /* Shipping Estimate */
        .shipping-box {
            background: #161616;
            border: 1px solid #282828;
            border-radius: 4px;
            padding: 12px 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 13px;
            color: #ddd;
        }

        .shipping-box i {
            font-size: 18px;
            color: #fff;
        }

        /* Description */
        .description-text {
            font-size: 13px;
            line-height: 1.5;
            color: #bbb;
        }

        /* Reviews Section */
        .reviews-box {
            background: #161616;
            border: 1px solid #282828;
            border-radius: 6px;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin-top: 10px;
        }

        .reviews-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .rating-summary {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 15px;
            font-weight: bold;
            color: #fff;
        }

        .rating-summary i {
            color: #eab308;
        }

        .see-all-reviews {
            font-size: 12px;
            color: #888;
            text-decoration: none;
        }

        .review-search {
            background: #111;
            border: 1px solid #333;
            border-radius: 4px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
            font-size: 12px;
        }

        .review-search input {
            background: transparent;
            border: none;
            color: white;
            width: 100%;
            outline: none;
            font-size: 12px;
        }

        .review-item {
            display: flex;
            flex-direction: column;
            gap: 6px;
            padding-top: 6px;
        }

        .reviewer-info {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: bold;
            color: #fff;
        }

        .reviewer-info i.fa-user-circle {
            font-size: 20px;
            color: #aaa;
        }

        .review-stars {
            color: #eab308;
            font-size: 11px;
        }

        .review-comment {
            font-size: 12px;
            color: #bbb;
            line-height: 1.4;
        }

        /* Footer */
        footer {
            background-color: #080808;
            border-top: 1px solid #222;
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            color: #777;
            margin-top: auto;
        }

        .social-icons {
            display: flex;
            gap: 15px;
            font-size: 15px;
        }

        .social-icons a {
            color: #888;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <!-- Header / Navbar -->
    <header>
        <div class="nav-left">
            <div class="logo-box">HKSD</div>
            <div class="store-info">
                <div class="store-name">Hana Kita shop</div>
                <div class="store-loc">Depok</div>
            </div>
        </div>
        <div class="nav-center">
            <div class="search-bar">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Cari perlengkapan layanan anda...">
            </div>
        </div>
        <div class="nav-right">
            <i class="fa-solid fa-cart-shopping cart-icon"></i>
            <button class="login-btn">Masuk</button>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">

        <!-- Left Column -->
        <div class="product-gallery">
            <div class="main-image">
                <!-- Using placeholder styled nicely to resemble the product image -->
                <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&q=80&w=600"
                    alt="Gelasan Venom Combat">
            </div>
            <div class="thumbnail-row">
                <div class="thumb active"><img
                        src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&q=80&w=200"
                        alt="Thumb 1"></div>
                <div class="thumb"><img
                        src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&q=80&w=200"
                        alt="Thumb 2"></div>
                <div class="thumb"><img
                        src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&q=80&w=200"
                        alt="Thumb 3"></div>
            </div>

            <!-- Related Products -->
            <div class="related-section">
                <div class="section-title">Produk Terkait</div>
                <div class="related-grid">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&q=80&w=300"
                            alt="Gelasan Venom">
                        <div class="card-body">
                            <div class="card-cat">Gelasan aduan</div>
                            <div class="card-title">Gelasan Venom</div>
                            <div class="card-footer">
                                <span class="card-price">Rp 40.000</span>
                                <button class="card-cart-btn"><i class="fa-solid fa-cart-shopping"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&q=80&w=300"
                            alt="Gelasan Venom">
                        <div class="card-body">
                            <div class="card-cat">Gelasan aduan</div>
                            <div class="card-title">Gelasan Venom</div>
                            <div class="card-footer">
                                <span class="card-price">Rp 40.000</span>
                                <button class="card-cart-btn"><i class="fa-solid fa-cart-shopping"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="product-details">
            <h1 class="product-title">Gelasan Venom Combat by Warok Kite</h1>
            <div class="product-badge">Gelasan Aduan</div>

            <ul class="product-bullets">
                <li>- Ultra tajam & tahan gesekan (ultra sharp & friction Resistant)</li>
                <li>- Diameter Benang 0.22</li>
                <li>- Panjang : 500 Meter per roll</li>
                <li>- Warna kemasan : Hijau Neon</li>
                <li>- Ideal untuk turnamen layangan aduan</li>
            </ul>

            <div class="variant-box">
                <span>Warna Benang : Merah Bata</span>
                <i class="fa-solid fa-chevron-down"></i>
            </div>

            <div class="action-row">
                <div class="qty-selector">
                    <button class="qty-btn">-</button>
                    <input type="text" class="qty-input" value="1">
                    <button class="qty-btn">+</button>
                </div>
                <button class="btn-cart"><i class="fa-solid fa-cart-shopping"></i> Tambah keranjang</button>
                <a href="/list">
                    <button class="btn-buy">Beli Sekarang</button>
                </a>
            </div>

            <div class="shipping-box">
                <i class="fa-solid fa-truck"></i>
                <div>
                    <div>Estimasi 2 hari (20 - 22 Agustus)</div>
                </div>
            </div>

            <div class="description-text">
                Gelasan Venom Combat adalah pilihan profesional untuk layangan aduan. Dibuat dengan bahan premium dan
                teknologi pelapisan khusus, benang ini menawarkan ketajaman ekstrem dan daya tahan yang tak tertandingi
                saat bergesekan dengan benang lawan. Produk ini hadir dalam kemasan eksklusif Warok Kite.
            </div>

            <!-- Reviews Box -->
            <div class="reviews-box">
                <div class="reviews-header">
                    <div class="rating-summary">
                        4.9 <i class="fa-solid fa-star"></i> Penilaian Produk
                    </div>
                    <a href="#" class="see-all-reviews">Lihat semua ></a>
                </div>
                <div class="review-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Cari Ulasan">
                </div>
                <div class="review-item">
                    <div class="reviewer-info">
                        <i class="fa-solid fa-user-circle"></i>
                        <span>Person 1</span>
                    </div>
                    <div class="review-stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="review-comment">
                        Sangat tajam, memotong benang lawan dengan mudah! Barang Ori, kualitas terjamin.
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Footer -->
    <footer>
        <div>&copy; 2026 Hana Kite Shop Depok. All rights reserved.</div>
        <div class="social-icons">
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="#"><i class="fa-brands fa-tiktok"></i></a>
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
        </div>
    </footer>

</body>

</html>
