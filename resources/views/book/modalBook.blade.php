<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

<div class="container">
    <div class="row">
        <div id="info" class="col-lg-4 col-sm-12" style="position: sticky; top: 0; height: 300px;">
            <img style="display: inline-block; height:auto; width: 100%; height: 250px; object-fit: cover; object-position: center;"
                src="{{ $book->image == '' ? 'holder.js/225x250?text=bookCover' : asset('images/bookCover/' . $book->image) }}"
                alt="bookCover">
            <div id="detail-info" class="my-3">
                <div class="my-1">
                    <h3 class="d-inline text-dark fw-semibold fs-4">{{ $book->title }}</h3>
                </div>
                <div class="my-1">
                    <span>
                        <i class="bi bi-person"></i>
                        <a class="d-inline text-dark" style="text-decoration: none;"
                            href="#">{{ $book->user->name }}</a>
                    </span>
                </div>
                <div class="my-1">
                    <span>
                        <i class="bi bi-journal"></i>
                        <p class="d-inline text-dark" href="#">{{ $book->genre->name }}</p>
                    </span>
                </div>
                <div class="my-1">
                    <span>
                        <i class="bi bi-calendar"></i>
                        <p class="d-inline text-dark" href="#">{{ $book->created_at->format('l, jS F Y') }}</p>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-sm-12">
            <div class="accordion" id="synopsis">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne" style="font-size: 1.25rem;">
                            Synopsis
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                        <div style="font-size: 1rem;" class="accordion-body">
                            {!! implode(' ', json_decode($book->description)) !!}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseTwo" style="font-size: 1.25rem;">
                            Chapter List
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            @if ($book->bookContent->isEmpty())
                                <p class="text-start">No Chapter Available</p>
                            @else
                                <ul>
                                    @foreach ($book->bookContent as $content)
                                        <li>
                                            <a href="{{ route('book.read', $content->id) }}"
                                                class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover text-dark">{!! $content->title !!}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- <div class="accordion-item">
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
                </div> --}}
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.8/holder.min.js"></script>
