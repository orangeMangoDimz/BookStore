@extends('layout.app')

@section('title', 'Home')

@section('content')
    <main class="container mt-5 mb-5 fs-5">
        <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="{{ route('createBook') }}">
            Add Book
          </a>
    </main>
@endsection
