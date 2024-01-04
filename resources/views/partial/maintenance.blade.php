@extends('layout.app')

@section('title', 'Add a Book')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="vh-100">
        <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap flex-column h-100">
            <h3>This Page is under maintenance at the moment</h3>
            <a href="{{ route('home') }}" class="btn btn-outline-dark">Back</a>
        </div>
    </div>
@endsection
