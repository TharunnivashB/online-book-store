@extends('layouts.app')

@section('title', $book->title)

@section('content')
<br>
<div class="max-w-5xl mx-auto px-4 py-8">
    <div class="md:flex gap-8 bg-white p-6 rounded-lg shadow-lg border border-gray-200">

        {{-- Book Details --}}
        <div class="mt-6 md:mt-0">
            <h1 class="text-3xl font-extrabold text-indigo-700 mb-4">Book Details</h1>

            {{-- Book Cover --}}
            <div class="flex-shrink-0">
                @php
                $isLocal = !Str::startsWith($book->cover, 'http');
                $imageSrc = $isLocal ? asset('storage/' . $book->cover) : $book->cover;
                $imgClass = $isLocal
                ? 'w-48 h-auto max-h-[350px] object-cover rounded-lg shadow-sm'
                : 'w-64 h-auto aspect-[2/3] object-cover rounded-lg shadow-sm';
                @endphp

                <img src="{{ $imageSrc }}"
                    alt="{{ $book->title }} cover"
                    class="{{ $imgClass }}">
            </div>

            <br>

            <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $book->title }}</h2>

            <p class="text-gray-600 text-md mb-1">
                {{ $book->author }}
                @if ($book->year)
                · {{ $book->year }}
                @endif
            </p>

            <div class="text-xl font-semibold text-indigo-700 mb-4">
                ₹{{ number_format($book->price, 2) }}
                @unless($book->in_stock)
                <span class="ml-3 text-sm font-bold text-red-600">Out of stock</span>
                @endunless
            </div>

            <p class="text-gray-700 leading-relaxed">{{ $book->description }}</p>
        </div>

    </div>
</div>
@endsection