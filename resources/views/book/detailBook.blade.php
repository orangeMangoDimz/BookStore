@extends('layout.app')

@section('title', 'Book Detail')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <section class="container my-5">
        <div class="grid gap-5">
            <div class="row">
                <div class="col-3">
                    <figure class="d-block">
                        <img style="display: inline-block; height: 250px; object-fit: cover; object-position: center;"
                            src="{{ $book->image == '' ? 'holder.js/285x250?text=BookCover' : asset('images/bookCover/' . $book->image) }}"
                            class="card-img-top" alt="book-preview">
                    </figure>
                    <figcaption class="d-flex justify-content-start align-items-start flex-column gap-2">
                        <p class="fw-semibold m-0">{{ $book->title }}</p>
                        <div>
                            <span>
                                <i class="bi bi-person"></i>
                                {{ $book->user->name }}
                            </span>
                        </div>
                        <div>
                            <span>
                                <i class="bi bi-calendar"></i>
                                {{ date('D-F-Y', strtotime($book->releaseDate)) }}
                            </span>
                        </div>
                    </figcaption>
                </div>
                <div class="col-9">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav" id="book-navigation">
                                    <a class="active nav-link fs-5" aria-current="page" href="#">Book Detail</a>
                                    <a class="nav-link fs-5" href="#">Chapter List</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <div id="cotnent" class="m-0 p-3 shadow-sm bg-body-tertiary rounded">
                        {{-- Content of nav tab --}}
                    </div>
                </div>
            </div>
    </section>
@endsection

@section('script')
    <script>
        const storyDetailContent = `
        <div class="mb-4">
            <h4>Bellow is detail of this book</h4>
            </div>
        <div class="mb-4">
                            <label for="book-title" class="form-label">Title</label>
                            <p class="ms-4">{{ $book->title }}</p>
                            </div>
                            <div class="mb-4">
                                <label for="genre" class="form-label">Gnere</label>
                                <p class="ms-4">{{ $book->genre->name }}</p>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="form-label">Description</label>
                            <div class="form-control" placeholder="Description" id="description" name="description"
                                contenteditable="false" style="font-size: 1.25rem;">
                                {!! implode(' ', json_decode($book->description)) !!}
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="price" class="form-label">Price</label>
                            <div class="input-group">
                                <p class="ms-4">Rp {{ number_format($book->price, 2) }}</p>
                                </div>
                                </div>
                                <div class="mb-4">
                                    <label for="release-date" class="form-label">Release Date</label>
                                    <p class="ms-4">{{ date('D-F-Y', strtotime($book->releaseDate)) }}</p>
                        </div>`;

        const chapterListContent = `
        <div class="mb-4">
            <h4>Bellow is chapter list of this book</h4>
            </div>
                        @if (!empty($book->bookContent))
                            <ul>
                            @foreach ($book->bookContent as $content)
                                    <li><a href="{{ route('book.read', $book->id) }}" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">{!! $content->title !!}</a></li>
                                @endforeach
                            </ul>
                        @else
                            <p>It looks like this book doesn't have any chapter yet!</p>
                        @endif
                        @if (Auth::check() && Auth::user()->id == $book->user_id)
                        <a href="{{ route('book.content.create', $book->id) }}" class="btn btn-primary">
                            + Add New Chapter
                            @endif
                        </a>
                    </div>`;

        window.addEventListener("load", () => {
            document.querySelector("#cotnent").innerHTML = storyDetailContent;
            const activeTabNav = document.querySelector('a[class^="active"]');
            activeTabNav.style.borderBottom = "2px solid blue";
            activeTabNav.style.fontWeight = "500";
        });

        const bookNavigation = document.querySelector("#book-navigation");
        bookNavigation.addEventListener("click", (e) => {
            e.preventDefault();
            const target = e.target;
            if (target.classList.contains("active")) {
                return;
            }
            if (target.innerText === "Book Detail") {
                target.classList.add("active");
                target.style.borderBottom = "2px solid blue";
                target.style.fontWeight = "500";
                target.nextElementSibling.removeAttribute("style");
                target.nextElementSibling.classList.remove("active");
                document.querySelector("#cotnent").innerHTML = storyDetailContent;
            } else {
                target.classList.add("active");
                target.previousElementSibling.classList.remove("active");
                target.previousElementSibling.removeAttribute("style");
                target.style.borderBottom = "2px solid blue";
                target.style.fontWeight = "500";
                document.querySelector("#cotnent").innerHTML = chapterListContent;
            }
        });
    </script>
@endsection
