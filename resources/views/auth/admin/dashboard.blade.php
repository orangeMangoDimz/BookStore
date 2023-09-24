@extends('partial.admin.sidebar')

@section('title', 'Dashboard')

@section('admin-content')
    <section class="p-4 w-100">
        <div class="bookList">
            <h3 class="my-3 text-start">Books List</h5>
                <table class="table table-striped table-hover shadow-sm p-3 mb-5 bg-body-tertiary rounded text-center">
                    <thead class="table-dark">
                        <tr class="border-2 border-dark fs-5">
                            <th style="width: 75px; vertical-align: middle;" scope="col h-100">No</th>
                            <th style="width: 200px; vertical-align: middle;" scope="col h-100">Cover</th>
                            <th style="width:200px; vertical-align: middle;" scope="col h-100">Book Name</th>
                            <th style="width: 200px; vertical-align: middle;" scope="col h-100">Author</th>
                            <th style="width: 200px; vertical-align: middle;" scope="col h-100">Publisher</th>
                            <th style="vertical-align: middle;" scope="col h-100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $num = 1; ?>
                        @foreach ($books as $book)
                            <tr class="border-2 border-dark">
                                <td style="vertical-align: middle" class="border-2 border-dark h-100">{{ $num++ }}
                                </td>
                                <td style="vertical-align: middle" class="border-2 border-dark h-100">
                                    <img style="display: inline-block; height: 150px; width:150px object-fit: cover; object-position: center;"
                                        src="{{ $book->image == '' ? 'holder.js/150x150?text=image' : asset('images/' . $book->image) }}"
                                        class="card-img-top" alt="book-preview">
                                </td>
                                <td style="vertical-align: middle" class="border-2 border-dark h-100">{{ $book->bookTitle }}
                                </td>
                                <td style="vertical-align: middle" class="text-center h-100">{{ $book->author->name }}</td>
                                <td style="vertical-align: middle" class="border-2 border-dark h-100">
                                    {{ $book->publisher->name }}</td>
                                <td style="vertical-align: middle" class="border-2 border-dark h-100">
                                    <div class="d-flex flex-wrap flex-row justify-content-center align-items-center"
                                        style="gap: 15px;">
                                        <a class="btn btn-primary" href="">
                                            View
                                        </a>
                                        <a class="btn btn-warning" href="">
                                            Edit
                                        </a>
                                        <form action="">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
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
@endsection
