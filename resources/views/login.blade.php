<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - POS Riski</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #eaf4ff, #ffffff);
            overflow: hidden;
        }

        .login-page {
            min-height: 100vh;
            display: flex;
            position: relative;
        }

        /* ================= LEFT SIDE ================= */

        .left-section {
            width: 55%;
            padding: 70px 8%;
            position: relative;
            overflow: hidden;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 25px;
        }

        .logo-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #087ff5, #1765d1);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 38px;
            box-shadow: 0 10px 25px rgba(0, 119, 255, 0.25);
        }

        .logo h1 {
            font-size: 52px;
            font-weight: 800;
            color: #102a56;
        }

        .logo h1 span {
            color: #087ff5;
        }

        .subtitle {
            font-size: 25px;
            color: #294c7c;
            font-weight: 600;
            line-height: 1.5;
            margin-bottom: 12px;
        }

        .description {
            color: #6480a8;
            font-size: 17px;
            line-height: 1.7;
            max-width: 560px;
        }

        /* FEATURES */

        .features {
            display: flex;
            gap: 28px;
            margin-top: 45px;
        }

        .feature {
            text-align: center;
            min-width: 110px;
        }

        .feature-icon {
            width: 58px;
            height: 58px;
            margin: auto;
            margin-bottom: 10px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            background: #e4f1ff;
            color: #087ff5;
        }

        .feature:nth-child(2) .feature-icon {
            background: #dcf8f0;
            color: #0bad82;
        }

        .feature:nth-child(3) .feature-icon {
            background: #eee5ff;
            color: #7a45db;
        }

        .feature:nth-child(4) .feature-icon {
            background: #fff1d8;
            color: #e99a00;
        }

        .feature p {
            color: #17375e;
            font-size: 14px;
            font-weight: 600;
            line-height: 1.4;
        }

        /* ILUSTRASI */

        .illustration {
            margin-top: 45px;
            width: 560px;
            height: 250px;
            background: linear-gradient(
                135deg,
                rgba(214, 234, 255, 0.8),
                rgba(242, 248, 255, 0.5)
            );
            border-radius: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #5b82ad;
            font-size: 18px;
            box-shadow: 0 15px 40px rgba(36, 110, 180, 0.08);
        }

        .illustration-content {
            text-align: center;
        }

        .cashier-icon {
            font-size: 90px;
            margin-bottom: 10px;
        }

        /* ================= RIGHT SIDE ================= */

        .right-section {
            width: 45%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
        }

        .login-card {
            width: 100%;
            max-width: 510px;
            background: rgba(255, 255, 255, 0.96);
            padding: 45px 42px;
            border-radius: 25px;
            box-shadow:
                0 25px 70px rgba(31, 95, 160, 0.16),
                0 5px 20px rgba(31, 95, 160, 0.08);
            border: 1px solid rgba(210, 228, 248, 0.8);
        }

        .login-icon {
            width: 85px;
            height: 85px;
            margin: auto;
            border-radius: 50%;
            background: linear-gradient(135deg, #087ff5, #1765d1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 40px;
            box-shadow: 0 12px 30px rgba(0, 119, 255, 0.25);
        }

        .login-title {
            text-align: center;
            margin-top: 22px;
            font-size: 34px;
            color: #102a56;
            font-weight: 800;
        }

        .login-title span {
            color: #087ff5;
        }

        .login-description {
            text-align: center;
            color: #7087a5;
            margin-top: 10px;
            margin-bottom: 35px;
            line-height: 1.6;
        }

        /* FORM */

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            margin-bottom: 9px;
            color: #38577e;
            font-size: 15px;
            font-weight: 600;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 17px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #4c80b9;
        }

        .form-control {
            width: 100%;
            height: 58px;
            border: 1.5px solid #d6e4f3;
            border-radius: 13px;
            padding: 0 18px 0 50px;
            outline: none;
            font-size: 15px;
            color: #263f61;
            background: #fafdff;
            transition: 0.25s;
        }

        .form-control:focus {
            border-color: #1684f7;
            box-shadow: 0 0 0 4px rgba(22, 132, 247, 0.10);
            background: white;
        }

        .form-control::placeholder {
            color: #9aadc4;
        }

        /* BUTTON */

        .btn-login {
            width: 100%;
            height: 58px;
            border: none;
            border-radius: 13px;
            background: linear-gradient(135deg, #087ff5, #1765d1);
            color: white;
            font-size: 17px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(8, 127, 245, 0.25);
            transition: 0.25s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(8, 127, 245, 0.32);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 15px;
            margin: 30px 0 20px;
            color: #8ca1bb;
            font-size: 13px;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #dce7f2;
        }

        .footer {
            text-align: center;
            color: #8aa0bb;
            font-size: 13px;
        }

        /* ALERT */

        .alert {
            background: #e1f6ed;
            border: 1px solid #b7e7d1;
            color: #187653;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .error {
            color: #dc3545;
            font-size: 13px;
            margin-top: 6px;
        }

        /* BACKGROUND SHAPES */

        .shape {
            position: absolute;
            border-radius: 50%;
            z-index: -1;
        }

        .shape-one {
            width: 350px;
            height: 350px;
            background: rgba(80, 160, 255, 0.10);
            top: -170px;
            left: -100px;
        }

        .shape-two {
            width: 300px;
            height: 300px;
            background: rgba(60, 140, 255, 0.10);
            right: -130px;
            bottom: -100px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1000px) {

            body {
                overflow: auto;
            }

            .login-page {
                display: block;
            }

            .left-section {
                width: 100%;
                padding: 45px 30px;
                text-align: center;
            }

            .logo {
                justify-content: center;
            }

            .description {
                margin: auto;
            }

            .features {
                justify-content: center;
                flex-wrap: wrap;
            }

            .illustration {
                margin: 40px auto 0;
                max-width: 100%;
            }

            .right-section {
                width: 100%;
                padding: 30px;
            }
        }

        @media (max-width: 600px) {

            .logo h1 {
                font-size: 38px;
            }

            .logo-icon {
                width: 58px;
                height: 58px;
                font-size: 30px;
            }

            .subtitle {
                font-size: 20px;
            }

            .features {
                gap: 18px;
            }

            .login-card {
                padding: 35px 25px;
            }

            .login-title {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

<div class="login-page">

    <!-- Background -->
    <div class="shape shape-one"></div>
    <div class="shape shape-two"></div>

    <!-- ================= LEFT ================= -->

    <section class="left-section">

        <div class="logo">
            <div class="logo-icon">
                🛒
            </div>

            <h1>
                POS <span>Riski</span>
            </h1>
        </div>

        <div class="subtitle">
            Solusi Mudah untuk Mengelola<br>
            Penjualan Anda
        </div>

        <p class="description">
            Kelola produk, transaksi, dan laporan penjualan
            dengan lebih cepat, mudah dan aman.
        </p>

        <div class="features">

            <div class="feature">
                <div class="feature-icon">
                    📊
                </div>
                <p>
                    Transaksi<br>
                    Lebih Cepat
                </p>
            </div>

            <div class="feature">
                <div class="feature-icon">
                    🛡️
                </div>
                <p>
                    Laporan<br>
                    Real-time
                </p>
            </div>

            <div class="feature">
                <div class="feature-icon">
                    📦
                </div>
                <p>
                    Stok Barang<br>
                    Terkontrol
                </p>
            </div>

            <div class="feature">
                <div class="feature-icon">
                    👥
                </div>
                <p>
                    Aman &<br>
                    Terpercaya
                </p>
            </div>

        </div>

        <div class="illustration">

            <div class="illustration-content">

                <div class="cashier-icon">
                    🖥️ 🛒
                </div>

                <strong>
                    Sistem Point of Sale
                </strong>

                <br>

                <span>
                    Kelola bisnis Anda dengan lebih mudah
                </span>

            </div>

        </div>

    </section>


    <!-- ================= RIGHT ================= -->

    <section class="right-section">

        <div class="login-card">

            <div class="login-icon">
                🛒
            </div>

            <h2 class="login-title">
                Login <span>POS Riski</span>
            </h2>

            <p class="login-description">
                Silakan masuk dengan akun Anda<br>
                untuk melanjutkan
            </p>

            {{-- Pesan logout --}}
            @if (session('status'))
                <div class="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Error --}}
            @if ($errors->any())
                <div class="alert" style="background:#fff0f0;color:#b42318;border-color:#ffd0d0;">
                    Email atau password yang Anda masukkan salah.
                </div>
            @endif

            <form action="{{ route('auth') }}" method="POST">

                @csrf

                <!-- EMAIL -->

                <div class="form-group">

                    <label class="form-label">
                        ✉️ Email address
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            ✉
                        </span>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="contoh@email.com"
                            value="{{ old('email') }}"
                            required
                        >

                    </div>

                    @error('email')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- PASSWORD -->

                <div class="form-group">

                    <label class="form-label">
                        🔒 Password
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            🔒
                        </span>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Masukkan password"
                            required
                        >

                    </div>

                    @error('password')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- BUTTON -->

                <button type="submit" class="btn-login">
                    ↪ &nbsp; Submit
                </button>

            </form>


            <div class="divider">
                POS Riski
            </div>

            <div class="footer">
                © {{ date('Y') }} POS Riski. Semua hak dilindungi.
            </div>

        </div>

    </section>

</div>

</body>
</html>