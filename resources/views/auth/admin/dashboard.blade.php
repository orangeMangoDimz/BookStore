@extends('partial.admin.sidebar')

@section('title', 'Dashboard')

@section('admin-content')
@if (count($books) > 0)
<section class="container p-4 w-100">
    <div class="bookList">
        <h3 class="my-3 text-start">Books List</h5>
            <table class="table table-striped table-hover shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                <thead class="table-dark">
                    <tr class="border-2 border-dark fs-5">
                        <th style="width: 75px; vertical-align: middle;" scope="col h-100" class="text-center">No</th>
                        <th style="width: 200px; vertical-align: middle;" scope="col h-100" class="text-center">Cover
                        </th>
                        <th style="width:200px; vertical-align: middle;" scope="col h-100" class="text-center">Book
                            Name
                        </th>
                        <th style="width: 200px; vertical-align: middle;" scope="col h-100" class="text-center">
                            Author
                        </th>
                        <th style="width: 200px; vertical-align: middle;" scope="col h-100" class="text-center">
                            Publisher</th>
                        <th style="vertical-align: middle;" scope="col h-100" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num = 1; ?>
                    @foreach ($books as $book)
                        <tr class="border-2 border-dark">
                            <td style="vertical-align: middle" class="text-center border-2 border-dark h-100">
                                {{ $num++ }}
                            </td>
                            <td style="vertical-align: middle" class="border-2 border-dark h-100 text-center">
                                <img style="display: inline-block; height: 150px; width:150px object-fit: cover; object-position: center;"
                                    src="{{ $book->image == '' ? 'holder.js/150x150?text=image' : asset('images/' . $book->image) }}"
                                    class="card-img-top" alt="book-preview">
                            </td>
                            <td style="vertical-align: middle" class="text-center border-2 border-dark h-100">
                                {{ $book->bookTitle }}
                            </td>
                            <td style="vertical-align: middle" class="text-center text-center h-100">
                                {{ $book->author->name }}</td>
                            <td style="vertical-align: middle" class="text-center border-2 border-dark h-100">
                                {{ $book->publisher->name }}</td>
                            <td style="vertical-align: middle" class="border-2 border-dark h-100">
                                <div class="d-flex flex-wrap flex-row justify-content-center align-items-center"
                                    style="gap: 15px;">
                                    {{-- mdoal --}}
                                    <div class="modal fade modal-lg" id="bookDetail" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Book
                                                        Description
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" id="bookDetailContent">
                                                    {{-- list of content --}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="bookDetailBtn btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#bookDetail"
                                        data-bookId={{ $book->id }}>
                                        <i class="fi fi-rr-eye"></i>
                                        View
                                    </button>
                                    <a class="btn btn-warning" href="{{ route('book.edit', $book->id) }}">
                                        <i class="fi fi-rr-pencil"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('book.destroy', $book->id) }}" method="POST"
                                        class="deleteForm">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="deleteBtn btn btn-danger">
                                            <i class="fi fi-rr-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    <div class="container my-3">
        {{ $books->onEachSide(5)->links() }}
    </div>
</section>
@else
<section class="container p-4">
    <div class="d-flex flex-column justify-content-center align-items-center w-100 h-100">
        <h1>Oops...</h1>
        <p class="fs-4 fw-light" >No Books Are Available Yet</p>
    </div>
</section>
@endif
@endsection

@section('script')
    <script src="{{ asset('js/index.js') }}"></script>
    <script>
        const deleteBtn = document.querySelector('.deleteBtn');
        const deleteForm = document.querySelector('.deleteForm');

        deleteBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-outline-primary',
                    cancelButton: 'btn btn-primary me-3'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'Are you sure want to delete this book?',
                text: "You won't be able to revert this",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Good job!',
                        'You clicked the button!',
                        'success'
                    )
                    setTimeout(() => {
                        deleteForm.submit()
                    }, 1000);
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    );
                }
            });
        });
    </script>
@endsection
