@extends('layouts.app')
@section('title','Browse Books')

@section('content')
<br>
<h1 class="text-2xl font-bold mb-4">All Books</h1>

<div class="container-fluid">
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3">
        @foreach($books->take(12) as $b)
            @php
                $cover = $b->cover
                    ? (Str::startsWith($b->cover, 'http') ? $b->cover : asset('storage/' . $b->cover))
                    : 'https://via.placeholder.com/150x200?text=No+Image';
            @endphp

            <div class="col">
                <a href="{{ route('books.show', $b) }}" class="card h-100 text-decoration-none text-dark">
                    <img src="{{ $cover }}" alt="{{ $b->title }}" class="card-img-top object-fit-cover" style="height: 200px;" />
                    <div class="card-body p-2">
                        <h5 class="card-title fs-6 mb-1 text-truncate">{{ $b->title }}</h5>
                        <p class="card-text text-muted small mb-1 text-truncate">{{ $b->author }}</p>
                        <div class="text-danger fw-bold">
                    ₹{{ number_format($b->price, 2) }}
                    @unless($b->in_stock)
                        <span class="ml-3 text-sm font-bold text-red-600">Out of stock</span>
                    @endunless
                            <span class="text-muted text-decoration-line-through ms-1">₹{{ rand(0, 200) }}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<div class="mt-4">
    {{ $books->links() }}
</div>
@endsection
