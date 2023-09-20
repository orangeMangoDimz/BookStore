@extends('layout.app')

@section('title', 'Home')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <main class="container mt-5 mb-5 fs-5">
        <div class="card p-5 my-5 shadow-sm p-3 mb-5 bg-body-tertiary rounded" style="width: 100%;">
            <div class="row">
                <div class="col-3">
                    <img src="..." class="card-img-top" style="width: 50%" alt="...">
                </div>
                <div class="col">
                    <div class="card-body">
                        <h3 class="card-title">{{ $publisher->name }}</h3>
                        <p class="card-text">{{ $publisher->description }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bookList">
            <h5 class="my-3 text-center">Here are some books that have been published</h5>
            <table class="table table-striped table-hover shadow-sm p-3 mb-5 bg-body-tertiary rounded text-center">
                <thead class="table-dark">
                    <tr class="border-2 border-dark">
                        <th scope="col">No</th>
                        <th scope="col">Book</th>
                        <th style="width: 35%" scope="col">Description</th>
                        <th style="width: 15%" scope="col">Price</th>
                        <th scope="col">Published Time</th>
                    </tr>
                </thead>
                <tbody>
                    {{ $num = 1; }}
                    @foreach ($books as $book)
                        <tr class="border-2 border-dark">
                            <td style="vertical-align: middle" class="border-2 border-dark h-100">{{ $num++; }}</td>
                            <td style="vertical-align: middle" class="border-2 border-dark h-100">{{ $book->bookTitle }}</td>
                            <td style="vertical-align: middle" class="text-start h-100">{{ $book->description }}</td>
                            <td style="vertical-align: middle" class="border-2 border-dark h-100">Rp {{ number_format($book->price, 2) }}</td>
                            <td style="vertical-align: middle" class="border-2 border-dark h-100">{{ date ('d-M-Y', strtotime ($book->releaseDate)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
