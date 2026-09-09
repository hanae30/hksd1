<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Hana Kita shop Depok</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #000000;
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header / Navbar */
        header {
            background-color: #0d0d0d;
            padding: 12px 24px;
            display: flex;
            align-items: center;
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
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 14px;
            letter-spacing: 0.5px;
            border: 2px solid #ef4444;
            display: flex;
            flex-direction: column;
            align-items: center;
            line-height: 1.1;
        }

        .logo-box span {
            font-size: 7px;
            letter-spacing: 0px;
        }

        .store-info .store-name {
            font-size: 13px;
            font-weight: bold;
            color: #fff;
        }

        .store-info .store-loc {
            font-size: 10px;
            color: #aaa;
        }

        /* Container */
        .container {
            max-width: 950px;
            margin: 30px auto;
            padding: 0 20px;
            flex: 1;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        /* Payment Card Box */
        .payment-card {
            background-color: #141414;
            border: 1px solid #222;
            border-radius: 8px;
            width: 100%;
            padding: 30px 40px;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .payment-header {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
        }

        .payment-header i {
            cursor: pointer;
            font-size: 16px;
        }

        .payment-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 25px;
            margin-top: 10px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            width: 100%;
            max-width: 500px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
        }

        .total-amount {
            color: #fff;
        }

        .qrcode-container {
            background: #ffffff;
            padding: 12px;
            border-radius: 6px;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 240px;
            height: 260px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }

        .qrcode-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* Footer */
        footer {
            background-color: #050505;
            padding: 16px 24px;
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: auto;
            border-top: 1px solid #1a1a1a;
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
        </div>
    </header>

    <!-- Main Container -->
    <div class="container">

        <div class="payment-card">

            <div class="payment-header">
                <a href="/list">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <span>Pembayaran</span>
            </div>

            <div class="payment-content">
                <div class="total-row">
                    <span>Total Pembayaran</span>
                    <span class="total-amount">Rp 90.000</span>
                </div>

                <div class="qrcode-container">
                    <!-- QRIS standard QR code placeholder image -->
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=00020101021126570014ID.CO.QRIS.WWW0118936009143000000000303UMI5204549953033605802ID5914HANA_KITE_SHOP6005DEPOK63048E12"
                        alt="QRIS QR Code">
                </div>
            </div>

        </div>

    </div>

    <!-- Footer -->
    <footer>
        <div>&copy; 2026 Hana Kite Shop Depok. All rights reserved.</div>
    </footer>

</body>

</html>
