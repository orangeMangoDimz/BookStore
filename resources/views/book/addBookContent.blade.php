@extends('layout.app')

@section('title', 'Add a Content')

@section('content')
    <section class="container my-5">
        <form action="{{ route('book.content.store') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $id }}" name="book_id">
            <div class="p-3 text-center" id="title">
                <p>My Book Title</p>
            </div>

            <div class="border-top border-4"></div>

            <div class="my-3 p-3" id="content" style="min-height: 100vh;">
                <p>My Book Content ...</p>
            </div>

            <div class="d-flex flex-row gap-3 justify-content-end border-top border-4">
                <div class="my-4">
                    <a href="{{ route('home') }}" class="btn btn-danger me-2">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-success">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('style')
    <style>
        #content:focus {
            outline: none;
        }

        #title:focus {
            outline: none;
        }

        #title p {
            font-size: 2rem;
        }

        #content p {
            font-size: 1.5rem;
            line-height: 1.2rem;

        }
    </style>
@endsection

@section('script')
    <script>
        tinymce.init({
            selector: '#title',
            menubar: false,
            inline: true,
            toolbar: 'bold italic',
            content_style: 'strong, em, u { font-size: 2rem; }',
        });


        tinymce.init({
            selector: '#content',
            menubar: false,
            inline: true,
            content_style: 'strong, em, u { font-size: 1.5rem; }',
            plugins: 'image',
            toolbar: true,
            imagetools_toolbar: 'rotateleft rotateright | flipv fliph | editimage imageoptions'
        });
    </script>
@endsection
