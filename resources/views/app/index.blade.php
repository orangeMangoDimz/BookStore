@extends('layout.app')

@section('title', 'Home')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <main class="container mt-5 mb-5 fs-5 ">
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

        <div class="card py-5 shadow p-2 mb-5 bg-body-tertiary rounded">
            <div class="d-flex flex-wrap justify-content-evenly">
                @foreach ($books as $book)
                    <div class="card bookDetailBtn my-2" data-bs-toggle="modal" data-bs-target="#bookDetail"
                        data-bookId={{ $book->id }} style="width: 18rem;">
                        <img style="display: inline-block; height: 250px; object-fit: cover; object-position: center;"
                            src="{{ asset('images/' . $book->image) }}" class="card-img-top" alt="book-preview">
                        <div class="card-body">
                            <h4 class="card-title">{{ $book->bookTitle }}</h4>
                            <p class="card-text fs-6 fw-semibold">By: <a class="author"
                                    href="#">{{ $book->author->name }}</a></p>
                            <p class="card-text fs-6 mt-2">
                                {{ strlen($book->description) > 150 ? mb_strimwidth($book->description, 0, 150, '...') : $book->description }}
                            </p>
                            <div class="row">
                                <div class="col-4 like">
                                    <span>
                                        <i class="fi fi-rr-heart"></i>
                                    </span>
                                    <p class="d-inline">12</p>
                                </div>
                                <div class="col-4 view">
                                    <span>
                                        <i class="fi fi-rr-eye"></i>
                                    </span>
                                    <p class="d-inline">12</p>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade modal-lg" id="bookDetail" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            {{-- <h1 class="modal-title fs-5" id="exampleModalLabel">Book Description</h1> --}}
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" id="bookDetailContent">
                                            {{-- list of content --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
    <div class="container my-3">
        {{ $books->onEachSide(5)->links() }}
    </div>
@endsection

@section('script')
    <script>
        const divs = document.querySelectorAll('.bookDetailBtn')
        divs.forEach(div => {
            div.addEventListener(`click`, (e) => {
                const card = e.currentTarget.closest('.card')
                const bookID = $(card).data('bookid')
                $.ajax({
                    url: `book/detail/${bookID}`,
                    type: 'POST',
                    data: {
                        bookID: bookID,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (
                        data
                    ) => { // this function will implicitly run the detail function from controller
                        $('#bookDetailContent').html(data)
                    },
                    error: (e) => {
                        console.log(bookID)
                        console.log('erorr')
                    }
                })
            })
        })
    </script>
@endsection
