@extends('layouts.app')

@section('title', 'Produk')

@section('content')

@include('layouts.navbar')

<!-- Tambahkan Google Font & Bootstrap Icons untuk tampilan premium -->
<link rel="stylesheet" href="https://jsdelivr.net">
<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f8f9fa;
    }
    .card-custom {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    .table-custom thead {
        background-color: #f1f5f9;
    }
    .table-custom th {
        color: #475569;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .table-custom td {
        vertical-align: middle;
        color: #334155;
    }
    .search-input {
        border-radius: 8px 0 0 8px !important;
        border-right: none;
    }
    .search-btn {
        border-radius: 0 8px 8px 0 !important;
        border-left: none;
        background-color: #fff;
        color: #64748b;
    }
    .search-btn:hover {
        background-color: #f8f9fa;
        color: #334155;
    }
</style>

<div class="container py-4">
    <!-- Header Area -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800 fw-bold">Daftar Produk</h1>
            <p class="text-muted small mb-0">Kelola data dan inventaris produk Anda di sini.</p>
        </div>
        @can('create', App\Models\Produk::class)
        <a href="{{ route('produk.create') }}" class="btn btn-primary px-4 py-2 fw-semibold d-flex align-items-center gap-2 shadow-sm" style="border-radius: 8px;">
            <i class="bi bi-plus-lg"></i> Tambah Produk
        </a>
        @endcan
    </div>

    <!-- Filter & Search Card -->
    <div class="card card-custom mb-4">
        <div class="card-body p-3">
            <form action="{{ route('produk.index') }}" method="GET" class="m-0">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted" style="border-radius: 8px 0 0 8px;">
                        <i class="bi bi-search"></i>
                    </span>
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control border-start-0 ps-0 py-2"
                        placeholder="Cari nama produk..."
                        style="border-radius: 0 8px 8px 0;"
                    >
                    <button class="btn btn-outline-secondary px-4 py-2 ms-2" type="submit" style="border-radius: 8px;">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="card card-custom overflow-hidden">
        <div class="table-responsive">
            <table class="table table-custom table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th scope="col" class="ps-4 py-3" width="60">#</th>
                        <th scope="col" class="py-3">Foto</th>
                        <th scope="col" class="py-3">Nama Produk</th>
                        <th scope="col" class="py-3">Harga Beli</th>
                        <th scope="col" class="py-3">Harga Jual</th>
                        <th scope="col" class="py-3" width="100">Stok</th>
                        <th scope="col" class="py-3">Input Oleh</th>
                        <th scope="col" class="pe-4 py-3 text-end" width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td class="ps-4 fw-semibold text-muted">{{ $products->firstItem() + $loop->index }}</td>
                        <td>
                            <div class="bg-light rounded p-1 d-inline-block shadow-sm">
                                <img src="{{ asset('storage/'.$product->foto) }}"
                                    alt="{{ $product->nama }}"
                                    style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                            </div>
                        </td>
                        <td>
                            <span class="fw-semibold text-dark d-block">{{ $product->nama }}</span>
                        </td>
                        <td>
                            <span class="text-muted small">Rp</span> 
                            <span class="fw-medium">{{ number_format($product->harga_Beli, 0, ',', '.') }}</span>
                        </td>
                        <td>
                            <span class="text-muted small">Rp</span> 
                            <span class="fw-semibold text-success">{{ number_format($product->harga_jual, 0, ',', '.') }}</span>
                        </td>
                        <td>
                            @if($product->stok <= 5)
                                <span class="badge bg-danger-subtle text-danger px-2.5 py-1.5 rounded" style="font-size: 0.85rem;">
                                    {{ $product->stok }} <span class="small">Lapis</span>
                                </span>
                            @else
                                <span class="badge bg-success-subtle text-success px-2.5 py-1.5 rounded" style="font-size: 0.85rem;">
                                    {{ $product->stok }}
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-secondary-subtle text-secondary rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 28px; height: 28px; font-size: 0.75rem;">
                                    {{ strtoupper(substr($product->user->name, 0, 2)) }}
                                </div>
                                <span class="small text-muted">{{ $product->user->name }}</span>
                            </div>
                        </td>
                        <td class="pe-4 text-end">
                            <div class="d-inline-flex gap-1">
                                @can('view', $product)
                                <a href="{{ route('produk.show', $product->id) }}" class="btn btn-sm btn-light border" title="Detail">
                                    <i class="bi bi-eye text-primary"></i>
                                </a>
                                @endcan

                                @can('update', $product)
                                <a href="{{ route('produk.edit', $product->id) }}" class="btn btn-sm btn-light border" title="Ubah">
                                    <i class="bi bi-pencil text-warning"></i>
                                </a>
                                @endcan

                                @can('delete', $product)
                                <form action="{{ route('produk.destroy', $product) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-light border" title="Hapus" onclick="return confirm('Apakah anda yakin akan menghapus produk ini?')">
                                        <i class="bi bi-trash text-danger"></i>
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="bi bi-box-seam d-block display-6 mb-3 text-secondary"></i>
                            Data produk belum tersedia atau tidak ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination Area -->
    <div class="d-flex justify-content-between align-items-center mt-4">
        <div class="text-muted small">
            Menampilkan data ke-{{ $products->firstItem() ?? 0 }} sampai {{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} data.
        </div>
        <div>
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection