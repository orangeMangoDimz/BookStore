@extends('layout.app')

@section('content')
    <main class="container mt-5 mb-5">
        <div class="title-box mb-4">
            <h2>Add A New Publisher</h2>
            <hr>
        </div>

        <form method="POST" action="{{ route('publisher.store') }}">
            @csrf
            <div class="mb-4">
                <label for="author-name" class="form-label">Name</label>
                <input type="text" class="form-control" id="author-name" aria-describedby="emailHelp" placeholder="Author Name" name="name">
            </div>
            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" aria-describedby="emailHelp" placeholder="Description" name="description">
            </div>
            <div class="mb-4">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" aria-describedby="emailHelp" placeholder="address" name="address">
            </div>
            <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="email" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
@endsection
