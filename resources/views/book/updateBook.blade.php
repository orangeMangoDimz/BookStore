@extends('layout.app')

@section('content')
    <main class="container mt-5 mb-5">
        <div class="title-box mb-4">
            <h2>Add A New Book</h2>
            <hr>
        </div>

        <form method="POST" action="{{ route('book.updated' , $book->id) }}">
            @csrf
            <div class="mb-4">
                <label for="book-title" class="form-label">Book Title</label>
                <input type="text" class="form-control" id="book-title" aria-describedby="emailHelp" placeholder="Book Title" name="bookTitle" value="{{ $book->bookTitle }}">
            </div>
            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                {{-- <input type="text" class="form-control" id="description" aria-describedby="emailHelp" placeholder="Description" name="description" value="{{ $book->description }}"> --}}
                <textarea class="form-control" placeholder="Book Description" id="floatingTextarea2" style="height: 250px" name="description">{{ $book->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" placeholder="Author" name="author" value="{{ $book->author }}">
            </div>
            <div class="mb-4">
                <label for="author" class="form-label">Price</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="price" value="{{ $book->price }}">
                </div>
              </div>
              <div class="mb-4">
                <label for="release-date" class="form-label">Release Date</label>
                <input type="date" class="form-control" id="release-date" placeholder="Release Date" name="releaseDate" value="{{ $book->releaseDate->format('Y-m-d') }}">
            </div>
            <a href="{{ route('home') }}" type="submit" class="btn btn-danger me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </main>
@endsection
