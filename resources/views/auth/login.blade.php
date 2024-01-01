<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">


    {{-- manual css --}}
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

</head>

<body>

    <section class="d-flex justify-content-center align-items-center" style="background-color: #eee;">
        <div class="container p-0">
            <div class="card text-black p-5" style="border-radius: 25px;">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div class="w-100 order-2 order-lg-1">
                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">SIGN IN</p>
                        @if ($errors->any())
                            <div class="alert alert-danger my-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('user.search') }}" method="POST">
                            @csrf
                            <div class="my-3">
                                <span>
                                    <i class="bi bi-envelope"></i>
                                    <label for="email" class="form-label">Email</label>
                                </span>
                                <input type="email" class="form-control" id="email" aria-describedby="email"
                                    name="email" placeholder="Email" value="{{ old('email') }}">
                            </div>
                            <div class="my-3">
                                <span>
                                    <i class="bi bi-key"></i>
                                    <label for="password" class="form-label">Password</label>
                                </span>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                            </div>
                            <div class="my-3">
                                <input type="checkbox" class="me-2 form-check-input border border-1 border-primary"
                                    id="privacyAndPolicy" name="remember">
                                <label for="privacyAndPolicy" class="form-label">Remember Me</label>
                            </div>
                            <div class="my-3">
                                <label for="privacyAndPolicy" class="form-label">Don't
                                    have an account yet?
                                    <a href="{{ route('register') }}"
                                        class="d-block link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Sign
                                        Up</a></label>
                            </div>
                            <div class="my-3">
                                <button type="submit" class="btn btn-outline-primary w-100">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
