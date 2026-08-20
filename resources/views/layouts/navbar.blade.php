<nav class="navbar navbar-expand-lg bg-white shadow-sm border-bottom">
    <div class="container-fluid px-4">

        {{-- Logo --}}
        <a class="navbar-brand d-flex align-items-center fw-bold text-primary"
           href="{{ route('dashboard') }}">

            <span class="bg-primary text-white rounded-3 px-2 py-1 me-2">
                POS
            </span>

            <span class="text-dark">
                Point of Sale
            </span>

        </a>


        {{-- Tombol menu mobile --}}
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>


        {{-- Menu --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-4 me-auto mb-2 mb-lg-0 gap-lg-1">

                {{-- Dashboard --}}
                <li class="nav-item">

                    <a
                        class="nav-link px-3 rounded-3
                        {{ request()->is('dashboard') ? 'active bg-primary text-white' : 'text-dark' }}"
                        href="{{ route('dashboard') }}">

                        🏠 Dashboard

                    </a>

                </li>


                {{-- Users --}}
                <li class="nav-item">

                    <a
                        class="nav-link px-3 rounded-3
                        {{ request()->is('admin/users') ? 'active bg-primary text-white' : 'text-dark' }}"
                        href="{{ route('admin.users') }}">

                        👤 Users

                    </a>

                </li>


                {{-- Produk --}}
                <li class="nav-item">

                    <a
                        class="nav-link px-3 rounded-3
                        {{ request()->is('produk') ? 'active bg-primary text-white' : 'text-dark' }}"
                        href="{{ route('produk.index') }}">

                        📦 Produk

                    </a>

                </li>


                {{-- Penjualan --}}
                <li class="nav-item">

                    <a
                        class="nav-link px-3 rounded-3
                        {{ request()->is('penjualan') ? 'active bg-primary text-white' : 'text-dark' }}"
                        href="{{ route('penjualan.index') }}">

                        🛒 Penjualan

                    </a>

                </li>

            </ul>


            {{-- Logout --}}
            <form
                action="{{ route('logout') }}"
                method="POST"
                class="d-flex">

                @csrf

                <button
                    type="submit"
                    class="btn btn-danger px-4 rounded-3 fw-semibold">

                    ⇥ Logout

                </button>

            </form>

        </div>

    </div>
</nav>


<style>

    /* Navbar */
    .navbar {
        min-height: 65px;
    }

    /* Logo */
    .navbar-brand {
        font-size: 18px;
        letter-spacing: .2px;
    }

    /* Menu */
    .navbar-nav .nav-link {
        font-size: 14px;
        font-weight: 500;
        transition: all .2s ease;
    }

    /* Hover menu */
    .navbar-nav .nav-link:hover {
        background-color: #eef5ff;
        color: #0d6efd !important;
    }

    /* Menu aktif */
    .navbar-nav .nav-link.active {
        font-weight: 600;
        box-shadow: 0 3px 8px rgba(13, 110, 253, .18);
    }

    /* Logout */
    .btn-danger {
        transition: all .2s ease;
    }

    .btn-danger:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 10px rgba(220, 53, 69, .25);
    }

    /* Mobile */
    @media (max-width: 991px) {

        .navbar-nav {
            margin-left: 0 !important;
            margin-top: 15px;
            gap: 4px;
        }

        .navbar-nav .nav-link {
            padding: 10px 12px !important;
        }

        .navbar form {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .navbar form button {
            width: 100%;
        }

    }

</style>