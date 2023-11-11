@extends('layout.app')

@section('title', $book->bookTitle)

@section('content')
    <div class="container">
        <div class="my-3 d-flex justify-content-center">
            <img style="display: inline-block; height: 250px; object-fit: cover; object-position: center;"
                src="{{ $book->image == '' ? 'holder.js/285x250?text=BookCover' : asset('images/' . $book->image) }}"
                class="card-img-top" alt="book-preview">
        </div>
        <div class="my-3 text-center">
            <h4>{{ $book->bookTitle }}</h4>
            <p>By : {{ $book->author->name }}</p>
        </div>
        <div class="my-3">
            @foreach (json_decode($book->description) as $description)
                <p>
                    {{ $description }}
                </p>
            @endforeach
        </div>
    </div>
@endsection
