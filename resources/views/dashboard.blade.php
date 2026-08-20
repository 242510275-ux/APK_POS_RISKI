@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

@include('layouts.navbar')

<style>
    body {
        background: #f5f7fb;
        color: #172033;
    }

    .dashboard-container {
        padding: 30px 35px 50px;
    }

    /* Header */
    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .dashboard-header h1 {
        font-size: 32px;
        font-weight: 700;
        margin: 0;
        color: #172033;
    }

    .dashboard-header h1 span {
        color: #6c63ff;
    }

    .dashboard-subtitle {
        color: #7b8498;
        margin-top: 6px;
        font-size: 14px;
    }

    .date-badge {
        background: white;
        padding: 11px 18px;
        border-radius: 14px;
        color: #596579;
        font-size: 14px;
        box-shadow: 0 5px 20px rgba(30, 40, 70, 0.06);
        border: 1px solid #edf0f6;
    }

    /* Section */
    .section-title {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 21px;
        font-weight: 700;
        margin: 30px 0 15px;
        color: #172033;
    }

    .section-icon {
        width: 38px;
        height: 38px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eeecff;
        color: #6c63ff;
        font-size: 18px;
    }

    /* Cards */
    .stat-card {
        background: white;
        border-radius: 18px;
        padding: 23px;
        height: 100%;
        border: 1px solid #edf0f6;
        box-shadow: 0 8px 25px rgba(30, 40, 70, 0.06);
        transition: all 0.25s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 30px rgba(30, 40, 70, 0.10);
    }

    .stat-content {
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .stat-icon {
        width: 58px;
        height: 58px;
        min-width: 58px;
        border-radius: 17px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
    }

    .icon-purple {
        background: #eeebff;
        color: #6857e8;
    }

    .icon-blue {
        background: #e7f1ff;
        color: #3284e8;
    }

    .icon-green {
        background: #e5f8ef;
        color: #24a36a;
    }

    .icon-orange {
        background: #fff0df;
        color: #ed8b25;
    }

    .stat-label {
        color: #7b8498;
        font-size: 14px;
        margin-bottom: 7px;
    }

    .stat-value {
        font-size: 25px;
        font-weight: 700;
        color: #172033;
        margin: 0;
    }

    .stat-small {
        color: #8b94a7;
        font-size: 12px;
        margin-top: 5px;
    }

    /* Inventory */
    .inventory-card {
        background: white;
        border-radius: 18px;
        border: 1px solid #edf0f6;
        box-shadow: 0 8px 25px rgba(30, 40, 70, 0.06);
        overflow: hidden;
        height: 100%;
    }

    .inventory-header {
        padding: 20px 22px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #edf0f6;
    }

    .inventory-header h3 {
        font-size: 17px;
        font-weight: 700;
        margin: 0;
    }

    .status-badge {
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }

    .status-danger {
        background: #ffe9e9;
        color: #e54848;
    }

    .status-warning {
        background: #fff2dc;
        color: #d88617;
    }

    .inventory-body {
        padding: 0 20px;
    }

    .modern-table {
        width: 100%;
        border-collapse: collapse;
    }

    .modern-table th {
        color: #8992a5;
        font-size: 12px;
        font-weight: 600;
        padding: 15px 8px;
        text-align: left;
    }

    .modern-table td {
        padding: 16px 8px;
        border-top: 1px solid #f0f2f6;
        font-size: 14px;
        color: #465066;
    }

    .stock-danger {
        color: #e54848 !important;
        font-weight: 700;
    }

    .stock-empty {
        color: #d88617 !important;
        font-weight: 700;
    }

    .empty-state {
        text-align: center;
        padding: 35px 15px;
        color: #8992a5;
        font-size: 14px;
    }

    .empty-icon {
        font-size: 35px;
        margin-bottom: 10px;
        opacity: .6;
    }

    /* Best Selling */
    .best-selling-card {
        background: white;
        border-radius: 18px;
        border: 1px solid #edf0f6;
        box-shadow: 0 8px 25px rgba(30, 40, 70, 0.06);
        overflow: hidden;
    }

    .best-selling-header {
        padding: 20px 22px;
        border-bottom: 1px solid #edf0f6;
        font-size: 17px;
        font-weight: 700;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .dashboard-container {
            padding: 20px 15px 40px;
        }

        .dashboard-header {
            display: block;
        }

        .date-badge {
            display: inline-block;
            margin-top: 15px;
        }

        .dashboard-header h1 {
            font-size: 25px;
        }

        .stat-value {
            font-size: 20px;
        }
    }
</style>

<div class="dashboard-container">

    {{-- HEADER --}}
    <div class="dashboard-header">
        <div>
            <h1>
                Selamat datang di <span>POS RISKI!</span>
            </h1>

            <div class="dashboard-subtitle">
                Ringkasan aktivitas dan performa penjualan hari ini.
            </div>
        </div>

        <div class="date-badge">
            📅 {{ $tanggalHariIni->translatedFormat('l, d F Y') }}
        </div>
    </div>


    {{-- TODAY'S SALES --}}
    @can('viewAny', App\Models\User::class)

        <div class="section-title">
            <div class="section-icon">★</div>
            Today's Sales
        </div>

        <div class="row g-4">

            {{-- TOTAL PENJUALAN --}}
            <div class="col-md-6">
                <div class="stat-card">

                    <div class="stat-content">

                        <div class="stat-icon icon-purple">
                            💰
                        </div>

                        <div>
                            <div class="stat-label">
                                Total Nilai Penjualan Hari Ini
                            </div>

                            <h2 class="stat-value">
                                Rp {{ number_format($ringkasan['total_penjualan'], 0, ',', '.') }}
                            </h2>

                            <div class="stat-small">
                                Total pendapatan hari ini
                            </div>
                        </div>

                    </div>

                </div>
            </div>


            {{-- TOTAL TRANSAKSI --}}
            <div class="col-md-6">
                <div class="stat-card">

                    <div class="stat-content">

                        <div class="stat-icon icon-blue">
                            🛒
                        </div>

                        <div>
                            <div class="stat-label">
                                Jumlah Transaksi Hari Ini
                            </div>

                            <h2 class="stat-value">
                                {{ number_format($ringkasan['total_transaksi'], 0, ',', '.') }}
                            </h2>

                            <div class="stat-small">
                                Transaksi berhasil dilakukan
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>


        {{-- PAYMENT STATUS --}}
        <div class="section-title">
            <div class="section-icon" style="background:#e5f8ef;color:#24a36a;">
                💳
            </div>

            Cash & Payment Status
        </div>

        <div class="row g-4">

            {{-- CASH --}}
            <div class="col-md-6">
                <div class="stat-card">

                    <div class="stat-content">

                        <div class="stat-icon icon-green">
                            💵
                        </div>

                        <div>
                            <div class="stat-label">
                                Total Pembayaran Tunai
                            </div>

                            <h2 class="stat-value">
                                Rp {{ number_format($ringkasan['total_cash'], 0, ',', '.') }}
                            </h2>

                            <div class="stat-small">
                                Pembayaran menggunakan cash
                            </div>
                        </div>

                    </div>

                </div>
            </div>


            {{-- NON CASH --}}
            <div class="col-md-6">
                <div class="stat-card">

                    <div class="stat-content">

                        <div class="stat-icon icon-orange">
                            💳
                        </div>

                        <div>
                            <div class="stat-label">
                                Total Pembayaran Non-Tunai
                            </div>

                            <h2 class="stat-value">
                                Rp {{ number_format($ringkasan['total_non_tunai'], 0, ',', '.') }}
                            </h2>

                            <div class="stat-small">
                                Pembayaran digital / non-tunai
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    @endcan


    {{-- CRITICAL INVENTORY --}}
    <div class="section-title">
        <div class="section-icon"
             style="background:#ffe9e9;color:#e54848;">
            ⚠
        </div>

        Critical Inventory Status
    </div>


    <div class="row g-4">

        {{-- STOK RENDAH --}}
        <div class="col-md-6">

            <div class="inventory-card">

                <div class="inventory-header">

                    <h3>
                        Daftar Produk Stok Rendah
                    </h3>

                    <span class="status-badge status-danger">
                        Perlu perhatian
                    </span>

                </div>

                <div class="inventory-body">

                    <table class="modern-table">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Stok</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($produkStokRendah as $index => $produk)

                                <tr>

                                    <td>
                                        {{ $produkStokRendah->firstItem() + $index }}
                                    </td>

                                    <td>
                                        {{ $produk->nama }}
                                    </td>

                                    <td class="stock-danger">
                                        {{ $produk->stok }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3">

                                        <div class="empty-state">

                                            <div class="empty-icon">
                                                ✓
                                            </div>

                                            Seluruh produk berada dalam kondisi stok aman.

                                        </div>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        {{-- STOK HABIS --}}
        <div class="col-md-6">

            <div class="inventory-card">

                <div class="inventory-header">

                    <h3>
                        Produk Habis Stok
                    </h3>

                    <span class="status-badge status-warning">
                        Perlu restock
                    </span>

                </div>

                <div class="inventory-body">

                    <table class="modern-table">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Stok</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($produkStokHabis as $index => $produk)

                                <tr>

                                    <td>
                                        {{ $produkStokHabis->firstItem() + $index }}
                                    </td>

                                    <td>
                                        {{ $produk->nama }}
                                    </td>

                                    <td class="stock-empty">
                                        {{ $produk->stok }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3">

                                        <div class="empty-state">

                                            <div class="empty-icon">
                                                📦
                                            </div>

                                            Seluruh produk berada dalam kondisi stok aman.

                                        </div>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>


    {{-- BEST SELLING --}}
    <div class="section-title">

        <div class="section-icon"
             style="background:#fff2dc;color:#ed8b25;">
            🔥
        </div>

        Best Selling Products Today

    </div>


    <div class="best-selling-card">

        <div class="best-selling-header">
            Produk Terlaris Hari Ini
        </div>

        <div class="inventory-body">

            <table class="modern-table">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Unit Terjual</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse ($produkTerlaris as $index => $produk)

                        <tr>

                            <td>
                                {{ $index + 1 }}
                            </td>

                            <td>
                                <strong>
                                    {{ $produk->nama }}
                                </strong>
                            </td>

                            <td>
                                {{ $produk->stok }}
                            </td>

                            <td>
                                <span class="status-badge"
                                      style="background:#eeecff;color:#6857e8;">
                                    {{ $produk->total_terjual }} unit
                                </span>
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        📊
                                    </div>

                                    Belum ada data produk terlaris hari ini.

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection