<link rel="stylesheet" href="{{ asset('css/detail.css') }}">

<div class="container">
    <div class="row">
        <div class="col-4" style="position: sticky; top: 0; height: 300px;">
            <img style="display: inline-block; height:auto; width: 100%; height: 250px; object-fit: cover; object-position: center;"
                src="{{ $book->image == '' ? 'holder.js/225x250?text=bookCover' : asset('images/' . $book->image) }}"
                alt="bookCover">
            <div class="title my-3 fs-6">
                <h5 class="text-center fs-5">{{ $book->bookTitle }}</h5>
                <div class="authorInfo my-1">
                    <span class="d-inline"><i class="fi fi-rr-user"></i></span>
                    <p class="d-inline"><a class="author"
                            href="{{ route('publisher.detail', $book->publisher->id) }}">{{ $book->author->name }}</a>
                    </p>
                </div>
                <div class="publisherInfo my-1">
                    <span class="d-inline"><i class="fi fi-rr-users-alt"></i></span>
                    <p class="d-inline"><a class="publisher"
                            href="{{ route('publisher.detail', $book->publisher->id) }}">{{ $book->publisher->name }}</a>
                    </p>
                </div>
                <div class="releaseDateInfo my-1">
                    <span class="d-inline"><i class="fi fi-rr-calendar"></i></span>
                    <p class="d-inline ms-2"> {{ date('D-F-Y', strtotime($book->releaseDate)) }}</p>
                </div>
            </div>
        </div>

        <div class="col-8">
            <div class="accordion" id="synopsis">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne">
                            Synopsis
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body fs-6">
                            {{ $book->description }}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseTwo">
                            Chapter List
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body fs-6">
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until
                            the collapse plugin adds the appropriate classes that we use to style each element. These
                            classes control the overall appearance, as well as the showing and hiding via CSS
                            transitions. You can modify any of this with custom CSS or overriding our default variables.
                            It's also worth noting that just about any HTML can go within the
                            <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseThree">
                            Accordion Item #3
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body fs-6">
                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                            collapse plugin adds the appropriate classes that we use to style each element. These
                            classes control the overall appearance, as well as the showing and hiding via CSS
                            transitions. You can modify any of this with custom CSS or overriding our default variables.
                            It's also worth noting that just about any HTML can go within the
                            <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="modal-footer">
                <a href="#" class="btn btn-primary">Read this book</a>
            </div> --}}
            {{-- <a href="{{ route('book.update', $book->id) }}" class="btn btn-warning p-2">Update</a>
            <form action="{{ route('book.destroy', $book->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger p-2">Delete</button>
            </form> --}}
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.8/holder.min.js"></script>
