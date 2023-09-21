<header>
    <nav class="navbar navbar-expand-lg bg-dark p-4">
        <div class="container">
            <a class="navbar-brand text-light fw-semibold fs-4" href="{{ route('home') }}">BookStore</a>
            <div>
                <ul class="navbar-nav me-auto d-flex justify-content-between align-items-center g-5">
                    <li class="nav-item me-3">
                        <a href="{{ route('home') }}" class="nav-link active text-light fs-5" aria-current="page"
                            href="#">Home</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ auth()->user()->name }}
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item" href="#">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-primary" aria-current="page">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
