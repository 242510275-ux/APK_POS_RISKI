@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

@include('layouts.navbar')

<style>
    body {
        background: #f4f6f9;
    }

    .sales-page {
        padding: 30px;
    }

    /* HEADER */
    .sales-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .sales-title {
        margin: 0;
        font-size: 30px;
        font-weight: 700;
        color: #1e293b;
    }

    .sales-subtitle {
        margin-top: 6px;
        color: #64748b;
        font-size: 14px;
    }

    .btn-add {
        background: #2563eb;
        color: white;
        border: none;
        padding: 11px 18px;
        border-radius: 9px;
        text-decoration: none;
        font-weight: 600;
        box-shadow: 0 4px 10px rgba(37, 99, 235, .20);
        transition: .2s;
    }

    .btn-add:hover {
        background: #1d4ed8;
        color: white;
        transform: translateY(-2px);
    }

    /* STATISTIC */
    .stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
        margin-bottom: 22px;
    }

    .stat-card {
        background: white;
        border-radius: 14px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        box-shadow: 0 4px 15px rgba(15, 23, 42, .05);
        border: 1px solid #eef0f3;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .icon-blue {
        background: #e8f0ff;
    }

    .icon-green {
        background: #e8f8ef;
    }

    .icon-orange {
        background: #fff3df;
    }

    .stat-label {
        color: #64748b;
        font-size: 13px;
        margin-bottom: 3px;
    }

    .stat-value {
        font-size: 21px;
        font-weight: 700;
        color: #1e293b;
    }

    /* SEARCH */
    .search-box {
        background: white;
        padding: 18px;
        border-radius: 14px;
        margin-bottom: 20px;
        border: 1px solid #eef0f3;
        box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
    }

    .search-wrapper {
        position: relative;
    }

    .search-wrapper input {
        height: 45px;
        padding-left: 42px;
        border-radius: 9px;
        border: 1px solid #dbe1e8;
        box-shadow: none;
    }

    .search-wrapper input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .10);
    }

    .search-icon {
        position: absolute;
        left: 14px;
        top: 12px;
        z-index: 2;
        color: #94a3b8;
    }

    .btn-search {
        height: 45px;
        border-radius: 9px;
        padding: 0 20px;
        margin-left: 8px;
        font-weight: 500;
    }

    /* TABLE CARD */
    .table-card {
        background: white;
        border-radius: 14px;
        border: 1px solid #eef0f3;
        box-shadow: 0 5px 18px rgba(15, 23, 42, .05);
        overflow: hidden;
    }

    .table-header {
        padding: 18px 20px;
        border-bottom: 1px solid #eef0f3;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table-title {
        margin: 0;
        font-size: 17px;
        font-weight: 650;
        color: #1e293b;
    }

    .table-info {
        font-size: 13px;
        color: #64748b;
    }

    /* TABLE */
    .sales-table {
        margin: 0;
        width: 100%;
        border-collapse: collapse;
    }

    .sales-table thead th {
        background: #f8fafc;
        color: #64748b;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .4px;
        font-weight: 700;
        padding: 14px 16px;
        border-bottom: 1px solid #e5e7eb;
        white-space: nowrap;
    }

    .sales-table tbody td,
    .sales-table tbody th {
        padding: 15px 16px;
        border-bottom: 1px solid #f0f2f5;
        font-size: 14px;
        vertical-align: middle;
    }

    .sales-table tbody tr:last-child td,
    .sales-table tbody tr:last-child th {
        border-bottom: none;
    }

    .sales-table tbody tr {
        transition: .15s;
    }

    .sales-table tbody tr:hover {
        background: #f8fbff;
    }

    .number {
        color: #94a3b8;
        font-weight: 600;
    }

    .cashier {
        font-weight: 600;
        color: #334155;
    }

    .date {
        color: #64748b;
        white-space: nowrap;
    }

    .price {
        color: #111827;
        font-weight: 700;
        white-space: nowrap;
    }

    .payment {
        color: #475569;
        font-weight: 500;
    }

    /* STATUS */
    .status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
    }

    .status-completed {
        background: #dcfce7;
        color: #15803d;
    }

    .status-open {
        background: #fef3c7;
        color: #b45309;
    }

    .status-other {
        background: #e2e8f0;
        color: #475569;
    }

    .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
    }

    /* ACTION */
    .action-buttons {
        display: flex;
        align-items: center;
        gap: 5px;
        white-space: nowrap;
    }

    .action-buttons .btn {
        border-radius: 7px;
        font-size: 12px;
        font-weight: 600;
        padding: 7px 10px;
    }

    .btn-detail {
        background: #2563eb;
        color: white;
        border: none;
    }

    .btn-detail:hover {
        background: #1d4ed8;
        color: white;
    }

    .btn-edit {
        background: #fbbf24;
        color: #422006;
        border: none;
    }

    .btn-edit:hover {
        background: #f59e0b;
        color: #422006;
    }

    .btn-delete {
        background: #ef4444;
        color: white;
        border: none;
    }

    .btn-delete:hover {
        background: #dc2626;
        color: white;
    }

    /* PAGINATION */
    .pagination-area {
        padding: 18px 20px;
        border-top: 1px solid #eef0f3;
        display: flex;
        justify-content: center;
    }

    /* EMPTY */
    .empty-data {
        text-align: center;
        padding: 50px 20px !important;
        color: #64748b;
    }

    .empty-icon {
        font-size: 40px;
        margin-bottom: 10px;
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {

        .stats {
            grid-template-columns: 1fr;
        }

        .sales-header {
            align-items: flex-start;
            gap: 15px;
        }

        .table-card {
            overflow-x: auto;
        }

        .sales-table {
            min-width: 950px;
        }
    }

    @media (max-width: 600px) {

        .sales-page {
            padding: 18px;
        }

        .sales-header {
            flex-direction: column;
        }

        .sales-title {
            font-size: 25px;
        }

        .btn-add {
            width: 100%;
            text-align: center;
        }

        .search-box {
            padding: 12px;
        }

        .btn-search {
            padding: 0 14px;
        }
    }
</style>


<div class="sales-page">

    {{-- ALERT --}}
    @if(session('errors'))
        <div class="alert alert-danger">
            {{ session('errors') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    {{-- HEADER --}}
    <div class="sales-header">

        <div>
            <h1 class="sales-title">
                Penjualan
            </h1>

            <div class="sales-subtitle">
                Kelola dan pantau seluruh transaksi penjualan.
            </div>
        </div>

        <a href="{{ route('penjualan.create') }}" class="btn-add">
            + Tambah Penjualan
        </a>

    </div>


    {{-- STATISTIK --}}
    <div class="stats">

        <div class="stat-card">

            <div class="stat-icon icon-blue">
                🛒
            </div>

            <div>
                <div class="stat-label">
                    Total Transaksi
                </div>

                <div class="stat-value">
                    {{ $sales->total() }}
                </div>
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon icon-green">
                💰
            </div>

            <div>
                <div class="stat-label">
                    Transaksi Ditampilkan
                </div>

                <div class="stat-value">
                    {{ $sales->count() }}
                </div>
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon icon-orange">
                📊
            </div>

            <div>
                <div class="stat-label">
                    Halaman
                </div>

                <div class="stat-value">
                    {{ $sales->currentPage() }}
                </div>
            </div>

        </div>

    </div>


    {{-- SEARCH --}}
    <div class="search-box">

        <form action="{{ route('penjualan.index') }}" method="GET">

            <div class="input-group">

                <div class="search-wrapper flex-grow-1">

                    <span class="search-icon">
                        🔍
                    </span>

                    <input
                        type="text"
                        name="search"
                        value="{{ request()->search }}"
                        class="form-control"
                        placeholder="Cari transaksi atau kasir...">

                </div>

                <button type="submit" class="btn btn-primary btn-search">
                    Cari
                </button>

            </div>

        </form>

    </div>


    {{-- TABLE --}}
    <div class="table-card">

        <div class="table-header">

            <div>
                <h3 class="table-title">
                    Daftar Penjualan
                </h3>

                <div class="table-info">
                    Data transaksi terbaru
                </div>
            </div>

        </div>


        <div style="overflow-x:auto;">

            <table class="sales-table">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>Tanggal Transaksi</th>
                        <th>Kasir</th>
                        <th>Total Pembayaran</th>
                        <th>Metode</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>

                    @forelse ($sales as $sale)

                        <tr>

                            {{-- NOMOR --}}
                            <th class="number">
                                {{ $sales->firstItem() + $loop->index }}
                            </th>


                            {{-- TANGGAL --}}
                            <td class="date">
                                {{ $sale->created_at->translatedFormat('d M Y, H:i') }}
                            </td>


                            {{-- KASIR --}}
                            <td class="cashier">
                                {{ $sale->user->name ?? '-' }}
                            </td>


                            {{-- TOTAL --}}
                            <td class="price">
                                Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}
                            </td>


                            {{-- METODE --}}
                            <td class="payment">
                                {{ $sale->metode_pembayaran }}
                            </td>


                            {{-- STATUS --}}
                            <td>

                                @if($sale->status == 'COMPLETED')

                                    <span class="status status-completed">
                                        <span class="status-dot"></span>
                                        COMPLETED
                                    </span>

                                @elseif($sale->status == 'OPEN')

                                    <span class="status status-open">
                                        <span class="status-dot"></span>
                                        OPEN
                                    </span>

                                @else

                                    <span class="status status-other">
                                        <span class="status-dot"></span>
                                        {{ $sale->status }}
                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td>

                                <div class="action-buttons">

                                    <a
                                        href="{{ route('penjualan.show', $sale->id) }}"
                                        class="btn btn-detail">
                                        Detail
                                    </a>


                                    <a
                                        href="{{ route('penjualan.edit', $sale->id) }}"
                                        class="btn btn-edit">
                                        Edit
                                    </a>


                                    <form
                                        action="{{ route('penjualan.destroy', $sale->id) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-delete"
                                            onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="7" class="empty-data">

                                <div class="empty-icon">
                                    📦
                                </div>

                                <strong>
                                    Belum ada data penjualan
                                </strong>

                                <div>
                                    Data transaksi akan muncul di sini.
                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($sales->hasPages())

            <div class="pagination-area">
                {{ $sales->links() }}
            </div>

        @endif

    </div>

</div>

@endsection