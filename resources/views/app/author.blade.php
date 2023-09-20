@extends('layout.app')

@section('title', 'Home')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <main class="container mt-5 mb-5 fs-5">

        <div class="card p-5 my-5" style="width: 100%;">
            <div class="row">
                <div class="col-3">
                    <img src="..." class="card-img-top" style="width: 50%" alt="...">
                </div>
                <div class="col">
                    <div class="card-body">
                        <h3 class="card-title">Publisher Name</h3>
                        <p class="card-text">Publisher Desc.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <h5>Here are some books that have been published</h5>
            </div>
        </div>

        <table class="table table-striped table-hover shadow-sm p-3 mb-5 bg-body-tertiary rounded">
            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Book</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Published Time</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="text-center" scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>Otto</td>
                </tr>
            </tbody>
        </table>
    </main>
@endsection
