<header class="z-2">
    <nav class="navbar navbar-expand-lg bg-dark p-4">
        <div class="container">
            <a class="navbar-brand text-light fw-semibold fs-4"
                href="{{ auth()->user()->role == 'admin' ? route('admin.dashboard') : route('home') }}">GeniusBook</a>
            <div>
                <ul class="navbar-nav me-auto d-flex justify-content-between align-items-center g-5">
                    @auth
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-primary" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ auth()->user()->name }}
                                </button>
                                <ul class="dropdown-menu mt-3">
                                    <li>
                                        <a href="{{ route('book.create') }}" class="dropdown-item" href="#">Create a
                                            Book</a>
                                    </li>
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
