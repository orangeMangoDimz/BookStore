@extends('layout.app')

@section('title', 'Add a Content')


@section('content')
    <section class="container my-5">
        <form id="createBookContent" action="{{ route('book.content.store') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $id }}" name="book_id">
            <div class="mytitle p-3 text-center" id="title">
                <p>My Book Title</p>
            </div>

            <div class="border-top border-4"></div>

            <div class="my-3 p-3" id="content" style="min-height: 100vh;">
                <p>My Book Content ...</p>
            </div>

            <div class="d-flex flex-row gap-3 justify-start-end border-top border-4">
                <div class="my-4">
                    <a href="{{ route('home') }}" class="btn btn-danger me-2">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-outline-dark">
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

        #title p,
        #title b,
        #title i,
        #title a,
        #title u,
        #title strong,
        #title em {
            font-size: 2rem;
        }

        #content p,
        #content b,
        #content i,
        #content u,
        #content a,
        #content strong,
        #content em {
            font-size: 1.5rem;
            line-height: 1.2rem;
        }
    </style>
@endsection

@section('script')
    @if ($errors->any())
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            let errorMessages = @json($errors->all());
            console.log(errorMessages);
            Swal.fire({
                icon: "error",
                title: errorMessages[0],
                text: errorMessages[1],
                confirmButtonColor: "#000",
            })
        </script>
    @endif
    <script>
        tinymce.init({
            selector: '#title',
            menubar: false,
            inline: true,
            plugins: 'image quickbars table link',
            toolbar: false,
        });

        tinymce.init({
            selector: '#content',
            menubar: false,
            inline: true,
            plugins: 'image quickbars table link',
            toolbar: false,
        });

        const form = document.querySelector('#createBookContent')
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            Swal.fire({
                icon: "success",
                title: "Congrats!",
                text: "Your have successfully create a new chapter!",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            }).catch((err) => {
                console.log(err);
            });
        })
    </script>
@endsection
