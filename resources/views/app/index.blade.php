@extends('layout.app')

@section('title', 'Home')

@section('content')
    <main class="container mt-5 mb-5 fs-5">
        <div class="title-box mb-4">
            <h2>All Books List</h2>
            <hr>
        </div>

        <div class="row mt-5">
            @foreach ($books as $book)
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->bookTitle }}</h5>
                            <p class="card-text">{{ strlen($book->description) > 215 ? mb_strimwidth($book->description, 0, 215, '...') : $book->description }}
                            <div class="card-footer d-flex justify-content-center align-items-center">
                                <button type="button" class="bookDetailBtn btn btn-primary p-2 w-100"
                                    data-bs-toggle="modal" data-bs-target="#bookDetail" data-bookId={{ $book->id }}>
                                    View Book Detail
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade modal-lg" id="bookDetail" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
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
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="{{ route('createBook') }}">
            Add Book
          </a> --}}
    </main>
@endsection

@section('script')
    <script>
        const main = document.querySelector(`main`)
        main.addEventListener(`click`, (e) => {
            if (e.target.classList.contains(`bookDetailBtn`)) {
                const bookID = $(e.target).data('bookid')
                $.ajax({
                    url: `book/detail/${bookID}`,
                    type: 'POST',
                    data: {
                        bookID: bookID,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => { // this function will implicitly run the showBookDetail function from controller
                        $('#bookDetailContent').html(data)
                    },
                    error: (e) => {
                        console.log(e)
                        console.log('erorr') 
                    }
                })
            }
        })
    </script>
@endsection
