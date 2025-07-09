@extends('layouts.app')

@section('title', 'Search Books')

@section('content')

<div class="text-center py-5">
    <h1 class="display-5">Welcome to BookHaven</h1>
    <p class="lead">Browse books, manage listings, and more!</p>
    <a href="{{ route('books.index') }}" class="btn btn-primary mt-3">Browse Books</a>
</div>
<div class="container py-4">
    <form method="GET" action="{{ route('home') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search books..." value="{{ request('q') }}" required>
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    @if ($hits->count())
    <h2 class="mb-3">Search Results</h2>
    <div class="row">
        @foreach ($hits as $book)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                @if ($book['cover'])
                <img src="{{ $book['cover'] }}" class="card-img-top" alt="Book Cover">
                @else
                <div class="card-img-top bg-secondary text-white text-center py-5">
                    No image
                </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $book['title'] }}</h5>
                    <p class="card-text text-muted">{{ $book['author'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @elseif(request()->has('q'))
    <p>No results found.</p>
    @endif
</div>
@endsection