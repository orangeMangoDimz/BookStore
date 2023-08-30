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
                            <p class="card-text">{{ $book->description }}
                            <div class="card-footer d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-primary p-2 w-100" data-bs-toggle="modal"
                                    data-bs-target="#bookDetail" data-bookId={{ $book->id }}>
                                    View Book Detail
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="bookDetail" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            {{-- list of content --}}
                                            <div class="container">
                                                <p><strong>Description</strong></p>
                                                <p>{{ $book->description }}</p>

                                                <a href="" class="btn btn-warning p-2">Update</a>
                                                <a href="" class="btn btn-danger p-2">Delete</a>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
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
