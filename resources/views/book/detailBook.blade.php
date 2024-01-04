@extends('layout.app')

@section('title', $book->title)

@section('style')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
    <section class="container my-5">
        <div class="grid gap-5">
            <div class="row">
                <div class="col-lg-3 col-sm-12">
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
                                <i class="bi bi-journal"></i>
                                <p class="d-inline text-dark" href="#">{{ $book->genre->name }}</p>
                            </span>
                        </div>
                        <div>
                            <span>
                                <i class="bi bi-calendar"></i>
                                <p class="d-inline text-dark">{{ $book->created_at->format('l, jS F Y') }}</p>
                            </span>
                        </div>
                    </figcaption>
                    @if (Auth::user()->name == $book->user->name)
                        <div class="my-3 d-flex justify-content-start flex-wrap flex-row align-items-center gap-3">
                            <a href="{{ route('book.edit', $book->id) }}" class="btn btn-outline-dark"><i
                                    class="bi bi-pencil" style="margin-right: 0 !important;"></i></a>
                            <form id="deleteForm" action="{{ route('book.destroy', $book->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger" id="deleteBtn"><i class="bi bi-trash3"
                                        style="margin-right: 0 !important;"></i></button>
                            </form>
                        </div>
                    @endif
                </div>
                <div class="col-lg-9 col-sm-12">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="navbar-nav d-flex flex-row justify-content-start align-items-start gap-3"
                            id="book-navigation">
                            <a class="active nav-link fs-5" aria-current="page" href="#">Book Detail</a>
                            <a class="nav-link fs-5" href="#">Chapter List</a>
                        </div>
                    </nav>
                    <div id="cotnent" class="m-0 p-3 shadow-sm bg-body-white rounded">
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
                                contenteditable="false" style="font-size: 1.25rem; border:none;">
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
                                    <p class="ms-4">{{ $book->created_at->format('l, jS F Y') }}</p>
                        </div>`;

        const chapterListContent = `
        <div class="mb-4">
            <h4>Bellow is chapter list of this book</h4>
            </div>
                        @if (!empty($book->bookContent))
                            <ul>
                            @foreach ($book->bookContent as $content)
                                    <li><a href="{{ route('book.read', $content->id) }}" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">{!! $content->title !!}</a></li>
                                @endforeach
                            </ul>
                        @else
                            <p>It looks like this book doesn't have any chapter yet!</p>
                        @endif
                        @if (Auth::check() && Auth::user()->id == $book->user_id)
                        <a href="{{ route('book.content.create', $book->id) }}" class="btn btn-outline-dark">
                            <i class="bi bi-plus me-2 fw-bold"></i> Add New Chapter
                            @endif
                        </a>
                    </div>`;

        window.addEventListener("load", () => {
            document.querySelector("#cotnent").innerHTML = storyDetailContent;
            const activeTabNav = document.querySelector('a[class^="active"]');
            activeTabNav.style.borderBottom = "2px solid black";
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
                target.style.borderBottom = "2px solid black";
                target.style.fontWeight = "500";
                target.nextElementSibling.removeAttribute("style");
                target.nextElementSibling.classList.remove("active");
                document.querySelector("#cotnent").innerHTML = storyDetailContent;
            } else {
                target.classList.add("active");
                target.previousElementSibling.classList.remove("active");
                target.previousElementSibling.removeAttribute("style");
                target.style.borderBottom = "2px solid black";
                target.style.fontWeight = "500";
                document.querySelector("#cotnent").innerHTML = chapterListContent;
            }
        });

        const deleteBtn = document.querySelector("#deleteBtn");
        deleteBtn.addEventListener("click", (e) => {
            e.preventDefault();
            console.log("clicked");
            Swal.fire({
                title: "Are you sure want to delete this book?",
                text: "All the cahpter will be deleted too!",
                icon: "warning",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Yes",
                customClass: {
                    confirmButton: "confirm-button-class"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "The book has been deleted!",
                        icon: "success"
                    });
                    setTimeout(() => {
                        document.querySelector('#deleteForm').submit();
                    }, 1500);
                }
            });
        });
    </script>
@endsection
