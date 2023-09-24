@extends('layout.app')

@section('content')
    <main class="container mt-5 mb-5">
        <div class="title-box mb-4">
            <h2>Add A New Book</h2>
            <hr>
        </div>

        <form method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="book-title" class="d-block form-label">Cover</label>
                <img style="display: inline-block;" src="holder.js/200x200?text=bookCover" class="rounded mb-3" id="imgPrev">
                <input type="file" class="imgUpload form-control" id="book-title" aria-describedby="emailHelp"
                    placeholder="Book Title" name="image" accept="image/*">
            </div>
            @error('image')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
            <div class="mb-4">
                <label for="book-title" class="form-label">Title</label>
                <input type="text" class="form-control" id="book-title" aria-describedby="emailHelp"
                    placeholder="Book Title" name="bookTitle">
                @error('bookTitle')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" aria-describedby="emailHelp"
                    placeholder="Description" name="description">
                @error('description')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
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
                    <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="price">
                </div>
                @error('price')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="release-date" class="form-label">Release Date</label>
                <input type="date" class="form-control w-25" id="release-date" placeholder="Release Date"
                    name="releaseDate">
                @error('releaseDate')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
@endsection

@section('script')
    <script src="{{ asset('js/book.js') }}"></script>
@endsection
