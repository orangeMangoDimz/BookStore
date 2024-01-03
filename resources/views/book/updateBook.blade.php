@extends('layout.app')

@section('title', 'Update Book')

@section('content')
    <main class="container mt-5 mb-5">
        <div class="title-box mb-4">
            <h2>{{ $book->bookTitle }}</h2>
            <hr>
        </div>

        <form method="POST" action="{{ route('book.store') }}"enctype="multipart/form-data" id="createBookForm">
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
                    placeholder="Book Title" name="bookTitle" value="{{ $book->title }}">
            </div>
            @error('bookTitle')
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
                <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 150px">{{ $book->description }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="price" class="form-label">Price</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="price"
                        value="{{ $book->price }}">
                </div>
                @error('price')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="release-date" class="form-label">Release Date</label>
                <input type="date" class="form-control w-25" id="release-date" placeholder="Release Date"
                    name="releaseDate" value="{{ date('Y-m-d', strtotime($book->releaseDate)) }}">
                @error('releaseDate')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
@endsection

@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('.description'))
            .catch(error => {
                console.error(error);
            });
        tinymce.init({
            selector: 'textarea#description',
            menubar: false,
        });
    </script>
@endsection
