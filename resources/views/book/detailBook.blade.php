@extends('layout.app')

@section('title', 'Book Detail')

@section('content')
    <section class="container my-5">
        <div class="grid gap-5">
            <div class="row">
                <div class="col-3">
                    <figure class="d-block">
                        <img src="holder.js/200x200?text=Book Cover" alt="book-cover">
                    </figure>
                    <figcaption>
                        <p class="fs-5">{{ $book->title }}</p>
                    </figcaption>
                </div>
                <div class="col-9">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav" id="book-navigation">
                                    <a class="nav-link fs-5" aria-current="page" href="#">Story Detail</a>
                                    <a class="nav-link fs-5" href="#">Chapter List</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <div id="cotnent" class="my-4 p-3 border border-1 border-black">

                    </div>
                </div>
            </div>
    </section>
@endsection

@section('script')
    <script>
        const storyDetailContent = `<div class="mb-4">
                            <label for="book-title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="book-title" aria-describedby="emailHelp"
                                placeholder="Book Title" name="title" value="{{ $book->title }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="genre" class="form-label">Gnere</label>
                            <select id="genre" class="form-select" aria-label="genre" name="genre_id" disabled>
                                <option selected value="{{ $book->genre->id }}">{{ $book->genre->name }}</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="form-label">Description</label>
                            <div class="form-control" placeholder="Description" id="description" name="description"
                                contenteditable="false">
                                {!! implode(' ', json_decode($book->description)) !!}
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="price" class="form-label">Price</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)"
                                    name="price" value="{{ $book->price }}" disabled>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="release-date" class="form-label">Release Date</label>
                            <input type="date" class="form-control w-25" id="release-date" placeholder="Release Date"
                                name="releaseDate" value="{{ $book->releaseDate }}" disabled>
                        </div>`;

        const chapterListContent = `  <a href="{{ route('book.content.create', $book->id) }}" class="btn btn-primary">
                            + Add New Chapter
                        </a>
                        @if (!empty($book->bookContent))
                            <ul>
                                @foreach ($book->bookContent as $content)
                                    <li><a href="#">{!! $content->title !!}</a></li>
                                @endforeach
                            </ul>
                        @else
                            <p>You don't have any chapter yet!</p>
                        @endif
                    </div>`;

        window.addEventListener('load', () => {
            document.querySelector('#cotnent').innerHTML = storyDetailContent;
        })

        const bookNavigation = document.querySelector('#book-navigation');
        bookNavigation.addEventListener('click', (e) => {
            e.preventDefault();
            const target = e.target;
            if (target.classList.contains('active')) {
                return;
            }
            if (target.innerText === 'Story Detail') {
                target.classList.add('active');
                target.nextElementSibling.classList.remove('active');
                document.querySelector('#cotnent').innerHTML = storyDetailContent;
            } else {
                target.classList.add('active');
                target.previousElementSibling.classList.remove('active');
                document.querySelector('#cotnent').innerHTML = chapterListContent;
            }
        });
    </script>
@endsection
