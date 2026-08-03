@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <strong>Detail Produk</strong>
                </div>

                <div class="card-body">
                    @if($produk->foto)
                        <div class="text-center mb-3">
                            <img src="{{ asset('storage/' . $produk->foto) }}"
                                 class="img-fluid rounded"
                                 style="max-height: 200px">
                        </div>
                    @endif

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Nama:</strong> {{ $produk->nama }}
                        </li>
                        <li class="list-group-item">
                            <strong>Harga Beli:</strong> Rp {{ number_format($produk->harga_beli) }}
                        </li>
                        <li class="list-group-item">
                            <strong>Harga Jual:</strong> Rp {{ number_format($produk->harga_jual) }}
                        </li>
                        <li class="list-group-item">
                            <strong>Stok:</strong> {{ $produk->stok }}
                        </li>
                    </ul>
                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('produk.index') }}" class="btn btn-secondary btn-sm">
                        Kembali
                    </a>

                    @can('update', $produk)
                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                    @endcan
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
