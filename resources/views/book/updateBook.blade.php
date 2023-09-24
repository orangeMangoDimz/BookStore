@extends('layout.app')

@section('title', 'Update Book')

@section('content')
    <main class="container mt-5 mb-5">
        <div class="title-box mb-4">
            <h2>{{ $book->bookTitle }}</h2>
            <hr>
        </div>

        <form method="POST" action="{{ route('book.update', $book->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="book-title" class="d-block form-label">Cover</label>
                <img style="display: inline-block;" src="holder.js/200x200?text=bookCover" class="rounded mb-3"
                    id="imgPrev">
                <input type="file" class="imgUpload form-control" id="book-title" aria-describedby="emailHelp"
                    placeholder="Book Title" name="image" accept="image/*">
            </div>
            @error('iamge')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
            <div class="mb-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="emailHelp"
                    placeholder="Book Title" name="bookTitle" value="{{ $book->bookTitle }}">
            </div>
            @error('bookTitle')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control description" placeholder="Book Description" id="floatingTextarea2" style="height: 250px"
                    name="description">{{ $book->description }}</textarea>
            </div>
            @error('description')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
            <div class="mb-4">
                <label for="Publisher" class="form-label">Publisher</label>
                <select id="Publisher" class="form-select" aria-label="publisher" name="publisher_id">
                    @foreach ($publishers as $publisher)
                        <option value="{{ $publisher->id }}"
                            {{ $book->publisher->name == $publisher->name ? 'selected' : '' }}>{{ $publisher->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="author" class="form-label">Price</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="price"
                        value="{{ $book->price }}">
                </div>
                @error('price')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="release-date" class="form-label">Release Date</label>
                <input type="date" class="form-control w-25" id="release-date" placeholder="Release Date"
                    name="releaseDate" value="{{ $book->releaseDate->format('Y-m-d') }}">
            </div>
            @error('releaseDate')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
            <a href="{{ route('home') }}" type="submit" class="btn btn-danger me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
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
    </script>
@endsection
