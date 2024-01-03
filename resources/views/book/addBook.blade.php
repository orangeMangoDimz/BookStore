@extends('layout.app')

@section('title', 'Add a Book')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/book.css') }}">
    <style>
        .tox-statusbar {
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <main class="container my-5 px-4">
        <div class="title-box mb-4">
            <h2>Add Your Own Book</h2>
            <hr>
        </div>

        <form method="POST" action="{{ route('book.store') }}"enctype="multipart/form-data" id="createBookForm">
            @csrf
            <div class="mb-4">
                <label for="book-title" class="d-block form-label">Cover</label>
                <img style="display: inline-block; object-fit: cover;" src="holder.js/200x200?text=Book Cover"
                    class="rounded mb-3" id="imgPrev">
                <input type="file" class="imgUpload form-control" id="book-title" aria-describedby="emailHelp"
                    placeholder="Book Title" name="image" accept="image/*">
            </div>
            @error('image')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
            <div class="mb-4">
                <label for="book-title" class="form-label">Title</label>
                <input type="text" class="form-control" id="book-title" aria-describedby="emailHelp"
                    placeholder="Book Title" name="title">
                @error('title')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="genre" class="form-label">Gnere</label>
                <select id="genre" class="form-select" aria-label="genre" name="genre_id">
                    <option selected>-- Select Genre --</option>
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
                <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 150px"></textarea>
                @error('description')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-start align-items-center gap-3">
                <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-outline-dark"><i class="bi bi-plus me-2 fw-bold"></i>Add</button>
            </div>
        </form>
    </main>
@endsection

@section('script')
    <script src="{{ asset('js/book.js') }}"></script>
    <script>
        const form = document.querySelector('#createBookForm')
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            Swal.fire({
                icon: "success",
                title: "Congrats!",
                text: "Your have successfully create a book!",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            }).catch((err) => {
                console.log(err);
            });
        })
        tinymce.init({
            selector: 'textarea#description',
            menubar: false,
            content_style: "p { font-size: 1rem; line-height: 1rem;  }"
        });
    </script>
@endsection
