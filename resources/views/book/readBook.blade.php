@extends('layout.app')

{{-- @section('title', $book->bookTitle) --}}

@section('style')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        #title p {
            font-size: 2.5rem;
            font-weight: bold;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div id="title" class="my-5 text-center">
            {!! $bookContent->title !!}
        </div>
        <div class="my-3">
            <p>
                {!! $bookContent->content !!}
            </p>
        </div>
        <div class="my-3">
            <a href="{{ route('book.content.detail', $book->id) }}" class="btn btn-primary">Back</a>
        </div>
        {{-- <hr class="my-5"> --}}
        {{-- <div class="grid gap-3 mt-5">
            <div class="row">
                <div class="col-3">
                    <img style="display: inline-block; height: 250px; object-fit: cover; object-position: center;"
                        src="{{ $book->image == '' ? 'holder.js/285x250?text=BookCover' : asset('images/bookCover/' . $book->image) }}"
                        class="card-img-top" alt="book-preview">
                </div>
                <div class="col-4">
                    <div class="d-flex justify-content-start flex-column align-items-start my-5 gap-3">
                        <div>
                            <h3>{{ $book->title }}</h3>
                        </div>
                        <div>
                            <span>
                                <i class="bi bi-person"></i>
                                {{ $book->user->name }}
                            </span>
                        </div>
                        <div>
                            <span>
                                <i class="bi bi-calendar"></i>
                                <p class="d-inline">{{ $book->releaseDate->format('jS F Y') }}</p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <p>Note from the author about this book</p>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
