@extends('layout.app')

@section('title', 'Home')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <section class="container mt-5 mb-5 fs-5 ">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <h1>test</h1>
        </div>

        <div class="title-box mb-4 text-center">
            <h1>Explore the Creativity Without Limit</h1>
            <p class="fw-light">GeniusBook is the perfect place to <strong>explore, create, and publish</strong> your own
                book without limit.</p>
            <div class="d-flex align-items-center justify-content-center">
                <form class="d-flex g-3 w-50 my-4 shadow-sm bg-body-tertiary rounded" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search for a book ..." aria-label="Search">
                </form>
            </div>
        </div>

        <div class="py-3">
            <h3>Top Trending Books This Month</h3>
            <div class="card py-3 rounded">
                <div class="d-flex flex-wrap justify-content-evenly">
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active d-flex flex-wrap justify-content-evenly"
                                data-bs-interval="10000">
                                {{-- <img src="..." class="d-block w-100" alt="..."> --}}
                                @foreach ($books as $book)
                                    <div class="card my-2" style="width: 18rem;">
                                        <div class="bookCover d-flex align-items-center justify-content-center">
                                            <img style="display: inline-block; height: 250px; object-fit: cover; object-position: center;"
                                                src="{{ $book->image == '' ? 'holder.js/285x250?text=BookCover' : asset('/storage/images/' . $book->image) }}"
                                                class="card-img-top" alt="book-preview">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $book->bookTitle }}</h4>
                                            <p class="card-text fs-6 fw-semibold">By: <a class="author"
                                                    href="#">{{ $book->author->name }}</a></p>
                                            <p class="card-text fs-6 mt-2">
                                                {{ strlen(implode(' ', json_decode($book->description))) > 150
                                                    ? mb_strimwidth(implode(' ', json_decode($book->description)), 0, 150, '...')
                                                    : implode(' ', json_decode($book->description)) }}
                                            </p>
                                            <!-- Modal -->
                                            <div class="modal fade modal-lg" id="bookDetail" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Book
                                                                Description</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" id="bookDetailContent">
                                                            {{-- list of content --}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="{{ route('book.read', $book->id) }}" type="button"
                                                                class="btn btn-primary">Read
                                                                More</a>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer mb-3">
                                            {{-- <p class="fs-6 text-danger fw-semibold text-end">{{ 'Rp ' . number_format($book->price, 2) }}</p> --}}
                                            <button type="button" class="bookDetailBtn btn btn-primary p-2 w-100"
                                                data-bs-toggle="modal" data-bs-target="#bookDetail"
                                                data-bookId={{ $book->id }}>
                                                View Book Detail
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="..." class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="..." class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <h3>See More Books</h3>
        <div class="card py-3 rounded">
            <div class="d-flex flex-wrap justify-content-evenly">
                @foreach ($books as $book)
                    <div class="card my-2" style="width: 18rem;">
                        <div class="bookCover d-flex align-items-center justify-content-center">
                            <img style="display: inline-block; height: 250px; object-fit: cover; object-position: center;"
                                src="{{ $book->image == '' ? 'holder.js/285x250?text=BookCover' : asset('/storage/images/' . $book->image) }}"
                                class="card-img-top" alt="book-preview">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $book->bookTitle }}</h4>
                            <p class="card-text fs-6 fw-semibold">By: <a class="author"
                                    href="#">{{ $book->author->name }}</a></p>
                            <p class="card-text fs-6 mt-2">
                                {{ strlen(implode(' ', json_decode($book->description))) > 150
                                    ? mb_strimwidth(implode(' ', json_decode($book->description)), 0, 150, '...')
                                    : implode(' ', json_decode($book->description)) }}
                            </p>
                            <!-- Modal -->
                            <div class="modal fade modal-lg" id="bookDetail" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Book Description</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" id="bookDetailContent">
                                            {{-- list of content --}}
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ route('book.read', $book->id) }}" type="button"
                                                class="btn btn-primary">Read
                                                More</a>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer mb-3">
                            {{-- <p class="fs-6 text-danger fw-semibold text-end">{{ 'Rp ' . number_format($book->price, 2) }}</p> --}}
                            <button type="button" class="bookDetailBtn btn btn-primary p-2 w-100" data-bs-toggle="modal"
                                data-bs-target="#bookDetail" data-bookId={{ $book->id }}>
                                View Book Detail
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="{{ route('createBook') }}">
            Add Book
          </a> --}}
    </section>
    <div class="container my-3">
        {{ $books->onEachSide(5)->links() }}
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/index.js') }}"></script>
@endsection
