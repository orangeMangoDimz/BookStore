<div class="container">
    <div class="row">
        <div class="col-4">
            <img src="" alt="bookCover">
        </div>

        <div class="col-8">
            <p><strong>Title:</strong> {{ $book->bookTitle }}</p>
            <p><strong>Publishser:</strong> <a href="{{ route('publisher.detail' , $book->publisher->id) }}">{{ $book->publisher->name }}</a></p>
            <p><strong>Price:</strong> Rp {{ number_format($book->price, 2) }}</p>
            <p><strong>Release Date:</strong> {{ date('D-F-Y', strtotime($book->releaseDate)) }}</p>
            <p><strong>Description</strong></p>
            <p>{{ $book->description }}</p>
        
            <a href="{{ route('book.update', $book->id) }}" class="btn btn-warning p-2">Update</a>
            <form action="{{ route('book.destroy' , $book->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger p-2">Delete</button>
            </form>
        </div>
    </div>
</div>
