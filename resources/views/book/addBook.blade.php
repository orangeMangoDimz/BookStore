@extends('layout.app')

@section('title', 'Add a Book')

@section('content')
    <main class="container mt-5 mb-5">
        <div class="title-box mb-4">
            <h2>Add Your Own Story</h2>
            <hr>
        </div>

        <form method="POST" action="{{ route('book.store') }}"enctype="multipart/form-data" id="createBookForm">
            @csrf
            <div class="mb-4">
                <label for="book-title" class="d-block form-label">Cover</label>
                <img style="display: inline-block;" src="holder.js/200x200?text=Book Cover" class="rounded mb-3"
                    id="imgPrev">
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
            <div class="mb-4">
                <label for="price" class="form-label">Price</label>
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
        });
    </script>
@endsection
