@extends('layouts.app')

@section('title', 'Users')

@section('content')

@include('layouts.navbar')

<style>
    body {
        background: #f5f7fb;
        color: #172033;
    }

    .users-container {
        padding: 30px 35px 50px;
    }

    /* Header */
    .users-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .users-title h1 {
        margin: 0;
        font-size: 32px;
        font-weight: 700;
        color: #172033;
    }

    .users-title p {
        margin: 6px 0 0;
        color: #8992a5;
        font-size: 14px;
    }

    .btn-create {
        background: #6c63ff;
        color: white;
        border: none;
        padding: 11px 18px;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: .2s;
        box-shadow: 0 6px 15px rgba(108, 99, 255, .20);
    }

    .btn-create:hover {
        background: #584ff0;
        color: white;
        transform: translateY(-2px);
    }

    /* Search */
    .search-card {
        background: white;
        padding: 18px;
        border-radius: 16px;
        border: 1px solid #edf0f6;
        box-shadow: 0 7px 20px rgba(30, 40, 70, .05);
        margin-bottom: 20px;
    }

    .search-wrapper {
        display: flex;
        gap: 10px;
    }

    .search-input {
        border: 1px solid #e1e5ed;
        border-radius: 11px;
        padding: 11px 15px;
        height: 45px;
        box-shadow: none !important;
    }

    .search-input:focus {
        border-color: #6c63ff;
        outline: none;
    }

    .btn-search {
        background: #172033;
        color: white;
        border: none;
        border-radius: 11px;
        padding: 0 22px;
        font-weight: 600;
    }

    .btn-search:hover {
        background: #28344d;
        color: white;
    }

    /* Table Card */
    .table-card {
        background: white;
        border-radius: 18px;
        border: 1px solid #edf0f6;
        box-shadow: 0 8px 25px rgba(30, 40, 70, .06);
        overflow: hidden;
    }

    .table-header {
        padding: 20px 22px;
        border-bottom: 1px solid #edf0f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table-header h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
    }

    .user-count {
        background: #eeecff;
        color: #6857e8;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .users-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .users-table thead {
        background: #fafbfe;
    }

    .users-table th {
        color: #8992a5;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .3px;
        padding: 15px 20px;
        border-bottom: 1px solid #edf0f6;
    }

    .users-table td {
        padding: 16px 20px;
        border-bottom: 1px solid #f0f2f6;
        color: #465066;
        font-size: 14px;
        vertical-align: middle;
    }

    .users-table tbody tr {
        transition: .2s;
    }

    .users-table tbody tr:hover {
        background: #fafaff;
    }

    .users-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* User Name */
    .user-name {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: #eeecff;
        color: #6857e8;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: 700;
        font-size: 15px;
    }

    .user-name-text {
        font-weight: 600;
        color: #172033;
    }

    /* Role */
    .role-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        background: #e7f1ff;
        color: #3284e8;
        font-size: 12px;
        font-weight: 600;
    }

    /* Action */
    .action-buttons {
        display: flex;
        gap: 7px;
    }

    .btn-edit {
        background: #fff2dc;
        color: #d88617;
        border: none;
        padding: 7px 12px;
        border-radius: 9px;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
    }

    .btn-edit:hover {
        background: #ffe6bb;
        color: #b66e00;
    }

    .btn-delete {
        background: #ffe9e9;
        color: #e54848;
        border: none;
        padding: 7px 12px;
        border-radius: 9px;
        font-size: 12px;
        font-weight: 600;
    }

    .btn-delete:hover {
        background: #ffd7d7;
        color: #c93232;
    }

    /* Pagination */
    .pagination-wrapper {
        padding: 18px 20px;
        border-top: 1px solid #edf0f6;
    }

    /* Empty */
    .empty-users {
        text-align: center;
        padding: 45px 20px;
        color: #8992a5;
    }

    .empty-users-icon {
        font-size: 40px;
        margin-bottom: 10px;
    }

    /* Responsive */
    @media (max-width: 768px) {

        .users-container {
            padding: 20px 15px 40px;
        }

        .users-header {
            display: block;
        }

        .btn-create {
            display: inline-block;
            margin-top: 15px;
        }

        .search-wrapper {
            display: block;
        }

        .btn-search {
            width: 100%;
            height: 45px;
            margin-top: 8px;
        }

        .table-card {
            overflow-x: auto;
        }

        .users-table {
            min-width: 750px;
        }
    }
</style>


<div class="users-container">

    {{-- HEADER --}}
    <div class="users-header">

        <div class="users-title">

            <h1>
                Manajemen Users
            </h1>

            <p>
                Kelola akun pengguna dan hak akses sistem POS RISKI.
            </p>

        </div>

        <a href="{{ route('admin.users.create') }}"
           class="btn-create">
            + Tambah User
        </a>

    </div>


    {{-- SEARCH --}}
    <div class="search-card">

        <form action="{{ route('admin.users') }}"
              method="GET">

            <div class="search-wrapper">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control search-input"
                    placeholder="🔍  Cari username atau email..."
                >

                <button
                    class="btn btn-search"
                    type="submit">
                    Cari
                </button>

            </div>

        </form>

    </div>


    {{-- TABLE --}}
    <div class="table-card">

        <div class="table-header">

            <h3>
                Daftar Pengguna
            </h3>

            <span class="user-count">
                {{ $users->total() }} User
            </span>

        </div>


        <table class="users-table">

            <thead>

                <tr>
                    <th width="60">#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th width="220">Aksi</th>
                </tr>

            </thead>


            <tbody>

                @forelse($users as $user)

                    <tr>

                        {{-- NOMOR --}}
                        <td>
                            {{ $users->firstItem() + $loop->index }}
                        </td>


                        {{-- USER --}}
                        <td>

                            <div class="user-name">

                                <div class="user-avatar">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>

                                <div class="user-name-text">
                                    {{ $user->name }}
                                </div>

                            </div>

                        </td>


                        {{-- EMAIL --}}
                        <td>
                            {{ $user->email }}
                        </td>


                        {{-- ROLE --}}
                        <td>

                            <span class="role-badge">

                                {{ $user->role->name ?? 'Tidak ada role' }}

                            </span>

                        </td>


                        {{-- ACTION --}}
                        <td>

                            <div class="action-buttons">

                                <a
                                    href="{{ route('admin.users.edit', $user) }}"
                                    class="btn-edit">

                                    ✏ Edit

                                </a>


                                <form
                                    action="{{ route('admin.users.destroy', $user) }}"
                                    method="POST"
                                    style="display:inline;">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-delete"
                                        onclick="return confirm('Yakin ingin menghapus user ini?')">

                                        🗑 Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5">

                            <div class="empty-users">

                                <div class="empty-users-icon">
                                    👤
                                </div>

                                <strong>
                                    Tidak ada user ditemukan
                                </strong>

                                <div>
                                    Coba gunakan kata kunci pencarian yang berbeda.
                                </div>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>


        {{-- PAGINATION --}}
        @if($users->hasPages())

            <div class="pagination-wrapper">

                {{ $users->links() }}

            </div>

        @endif

    </div>

</div>

@endsection