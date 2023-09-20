@extends('layout.app')

@section('content')
    <main class="container mt-5 mb-5">
        <div class="title-box mb-4">
            <h2>Add A New Book</h2>
            <hr>
        </div>

        <form method="POST" action="{{ route('book.store') }}">
            @csrf
            <div class="mb-4">
                <label for="book-title" class="form-label">Book Title</label>
                <input type="text" class="form-control" id="book-title" aria-describedby="emailHelp"
                    placeholder="Book Title" name="bookTitle">
            </div>
            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" aria-describedby="emailHelp"
                    placeholder="Description" name="description">
            </div>
            <div class="mb-4">
                <label for="Publisher" class="form-label">Publisher</label>
                <select id="Publisher" class="form-select" aria-label="publisher" name="publisher_id">
                    <option selected>-- Select Publisher --</option>
                    @foreach ($publishers as $publisher)
                        <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="author" class="form-label">Price</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="price">
                </div>
            </div>
            <div class="mb-4">
                <label for="release-date" class="form-label">Release Date</label>
                <input type="date" class="form-control" id="release-date" placeholder="Release Date" name="releaseDate">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
@endsection
