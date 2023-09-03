<div class="container">
    <div class="row">
        <div class="col-4">
            <img src="" alt="bookCover">
        </div>

        <div class="col-8">
            <p><strong>Title:</strong> {{ $book->bookTitle }}</p>
            <p><strong>Author:</strong> {{ $book->author }}</p>
            <p><strong>Price:</strong> Rp {{ number_format($book->price, 2) }}</p>
            <p><strong>Release Date:</strong> {{ date('D-F-Y', strtotime($book->releaseDate)) }}</p>
            <p><strong>Description</strong></p>
            <p>{{ $book->description }}</p>
        
            <a href="{{ route('book.update', $book->id) }}" class="btn btn-warning p-2">Update</a>
            <a href="" class="btn btn-danger p-2">Delete</a>
        </div>
    </div>
</div>
