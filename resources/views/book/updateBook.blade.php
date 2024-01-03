@extends('layout.app')

@section('title', 'Update Book')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/book.css') }}">
    <style>
        .tox-statusbar {
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <main class="container mt-5 mb-5">
        <div class="title-box mb-4">
            <h2>{{ $book->title }}</h2>
            <hr>
        </div>

        @error('message')
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: // display the error message
                        "{{ $error['message'] }}",
                    footer: '<a href="#">Why do I have this issue?</a>'
                });
            </script>
        @enderror

        <form method="POST" action="{{ route('book.update', $book->id) }}"enctype="multipart/form-data" id="createBookForm">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="book-title" class="d-block form-label">Cover</label>
                <img style="display: inline-block; height: 250px; object-fit: cover; object-position: center;"
                    src="{{ $book->image = '' ? 'holder.js/200x200?text=bookCover' : asset('images/bookCover/' . $book->image) }}"
                    class="rounded mb-3" id="imgPrev">
                <input type="file" class="imgUpload form-control" id="book-title" aria-describedby="emailHelp"
                    placeholder="Book Title" name="image" accept="image/*" value="{{ $book->image }}">
            </div>
            @error('image')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
            <div class="mb-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="emailHelp"
                    placeholder="Book Title" name="title" value="{{ $book->title }}">
            </div>
            @error('title')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
            <div class="mb-4">
                <label for="genre" class="form-label">Gnere</label>
                <select id="genre" class="form-select" aria-label="genre" name="genre_id">
                    <option value="{{ $book->genre->id }}" selected>{{ $book->genre->name }}</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
                @error('genre_id')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 150px">{!! implode(' ', json_decode($book->description)) !!}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-start align-items-center gap-3">
                <a href="{{ route('book.content.detail', $book->id) }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-outline-dark"><i class="bi bi-pencil me-2"></i> Save</button>
            </div>
        </form>
    </main>
@endsection

@section('script')
    <script src="{{ asset('js/book.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('.description'))
            .catch(error => {
                console.error(error);
            });
        tinymce.init({
            selector: 'textarea#description',
            menubar: false,
            content_style: "p { font-size: 1rem; line-height: 1rem;  }"
        });
    </script>
@endsection
