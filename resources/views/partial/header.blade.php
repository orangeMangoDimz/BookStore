<link rel="stylesheet" href="{{ asset('css/header.css') }}">

<header class="z-3">
    <nav class="navbar navbar-expand-lg bg-dark p-4 shadow p-3 mb-5 bg-body-tertiary rounded"
        style="background-color: #fff !important;">
        <div class="container">
            <div id="offcanvas">
                <a class="btn btn-outline-dark" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                    aria-controls="offcanvasExample">
                    <i class="bi bi-list" style="margin-right: 0 !important;"></i>
                </a>

                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                    aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header pb-2">
                        <a class="navbar-brand text-dark fw-semibold"
                            href="{{ auth()->user()->role == 'admin' ? route('admin.dashboard') : route('home') }}">BookStore</a>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body pt-0">
                        <span>
                            <i class="bi bi-plus-lg"></i>
                            <a href="{{ route('book.create') }}"
                                class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                                style="color: black !important;" href="#">Create a
                                Book</a>
                        </span>
                        <div class="dropdown mt-3">
                            <button class="btn btn-outline-dark dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span>
                                    <i class="bi bi-person"></i>
                                    <p id="name_offcanvas" class="d-inline">{{ auth()->user()->name }}</p>
                                </span>
                            </button>
                            <ul class="dropdown-menu mt-3">
                                <li>
                                    <a href="{{ route('profile', auth()->user()->id) }}"
                                        class="dropdown-item">Profile</a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <a id="title" class="navbar-brand text-dark fw-semibold"
                href="{{ auth()->user()->role == 'admin' ? route('admin.dashboard') : route('home') }}">BookStore</a>
            <div id="wrapper" class="d-flex flex-row gap-5 justify-content-center align-items-center">
                <span>
                    <i class="bi bi-plus-lg"></i>
                    <a href="{{ route('book.create') }}"
                        class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                        style="color: black !important;">Create a
                        Book</a>
                </span>
                @auth
                    <ul class="navbar-nav me-auto d-flex justify-content-between align-items-center g-5">
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-outline-dark dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span>
                                        <i class="bi bi-person"></i>
                                        <p id="name" class="d-inline">{{ auth()->user()->name }}</p>
                                    </span>
                                </button>
                                <ul class="dropdown-menu mt-3">
                                    <li>
                                        <a href="{{ route('profile', auth()->user()->id) }}"
                                            class="dropdown-item">Profile</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-primary" aria-current="page">Sign In</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
