@extends('layout.app')

@section('title', 'Book Chapter')


@section('style')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        #content-title p,
        #content-title em,
        #content-title span,
        #content-title a,
        #content-title strong,
        #content-title b,
        #content-title i {
            font-size: 2rem;
        }

        #content-description p,
        #content-description em,
        #content-description span,
        #content-description a,
        #content-description strong,
        #content-description b,
        #content-description i {
            font-size: 1.5rem;
        }
    </style>
@endsection
@section('content')
    <div class="container my-5">
        <div id="content-title" class="text-center p-3">
            <p>
                {!! $bookContent->title !!}
            </p>
        </div>
        <div class="border-top border-4"></div>
        <div id="content-description" class="my-3 p-3">
            <p>
                {!! $bookContent->content !!}
            </p>
        </div>
        <div class="my-3">
            <a href="{{ route('book.content.detail', $book->id) }}" class="btn btn-outline-dark">Back</a>
        </div>
    </div>
@endsection
