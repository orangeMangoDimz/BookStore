@extends('layout.app')

@section('title', 'Home')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <section class="container my-3 px-4">
        <div class="title-box text-center d-flex flex-column justify-content-center align-items-center">
            <h1>Explore the Creativity Without Limit</h1>
            <p class="fw-light">GeniusBook is the perfect place to <strong>explore, create, and publish</strong> your own
                book without limit.</p>
            <form id="search-box" class="shadow-sm bg-body-tertiary rounded w-50" role="search">
                <input class="form-control me-2" type="search" placeholder="Search for a book ..." aria-label="Search">
            </form>
        </div>

        <div class="my-5">
            <h3>Top Trending Books This Month</h3>
            <div class="my-3">
                <div id="card-wrapper"
                    class="shadow-sm bg-body-tertiary rounded d-flex flex-wrap justify-content-evenly align-items-center flex-row gap-3"
                    data-bs-interval="10000">
                    @foreach ($books as $book)
                        <div class="card shadow-sm bg-body-tertiary rounded" style="width: 400px;">
                            <div class="bookCover d-flex align-items-center justify-content-center">
                                <img style="display: inline-block; height: 250px; object-fit: cover; object-position: center;"
                                    src="{{ $book->image == '' ? 'holder.js/285x250?text=BookCover' : asset('images/bookCover/' . $book->image) }}"
                                    class="card-img-top" alt="book-preview">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{ $book->title }}</h4>
                                <div class="my-3 d-flex justify-content-between align-items-center flex-row">
                                    <div>
                                        <i class="bi bi-person"></i>
                                        <a class="text-dark" href="#"
                                            style="text-decoration: none;">{{ $book->user->name }}</a>
                                    </div>
                                    <div>
                                        <i class="bi bi-journal"></i>
                                        <p class="d-inline text-dark" href="#">{{ $book->genre->name }}</p>
                                    </div>
                                </div>
                                <p class="card-text m-0">
                                    {!! strlen(implode(' ', json_decode($book->description))) > 180
                                        ? mb_strimwidth(html_entity_decode(implode(' ', json_decode($book->description))), 0, 180, '...')
                                        : html_entity_decode(implode(' ', json_decode($book->description))) !!}
                                </p>'
                                <!-- Modal -->
                                <div class="modal fade modal-lg" id="bookDetail-{{ $book->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Book
                                                    Description</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id="bookDetailContent-{{ $book->id }}">
                                                {{-- list of content --}}
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ route('book.content.detail', $book->id) }}" type="button"
                                                    class="btn btn-outline-dark">Read
                                                    More</a>
                                                <button type="button" class="btn btn-dark"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p class="fw-light m-0 my-3">{{ $book->created_at->diffForHumans($currentDate) }}
                                </p>
                                <button type="button" class="bookDetailBtn btn btn-outline-dark p-2 w-100"
                                    data-bs-toggle="modal" data-bs-target="#bookDetail-{{ $book->id }}"
                                    data-bookId={{ $book->id }}>
                                    View Book Detail
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <div class="container my-3">
        {{ $books->onEachSide(5)->links() }}
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/index.js') }}"></script>
@endsection
