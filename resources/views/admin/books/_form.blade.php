@extends('layouts.app')

@section('title', 'Add New Book')

@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">

        {{-- Form Header --}}
        <div class="bg-gray-100 px-6 py-4 border-b border-gray-200">
            <h1 class="text-3xl font-extrabold text-indigo-700 flex items-center gap-3">
                <i class="fas fa-plus-circle text-indigo-600"></i>
                Add New Book
            </h1>
        </div>

        {{-- Form --}}
        <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Title</label>
                <input type="text" name="title" id="title"
                    value="{{ old('title') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('title') border-red-500 @enderror"
                    required>
                @error('title')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Author --}}
            <div>
                <label for="author" class="block text-sm font-semibold text-gray-700 mb-1">Author</label>
                <input type="text" name="author" id="author"
                    value="{{ old('author') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('author') border-red-500 @enderror"
                    required>
                @error('author')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('description') border-red-500 @enderror"
                    required>{{ old('description') }}</textarea>
                @error('description')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Price --}}
            <div>
                <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Price (₹)</label>
                <div class="relative">
                    <input type="number" step="0.01" name="price" id="price"
                        value="{{ old('price') }}"
                        class="w-full pl-8 px-4 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('price') border-red-500 @enderror"
                        required>
                </div>
                @error('price')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Cover Image --}}
            <div>
                <label for="cover" class="block text-sm font-semibold text-gray-700 mb-1">Cover Image</label>
                <input type="file" name="cover" id="cover"
                    class="w-full px-4 py-2 border rounded-lg file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 @error('cover') border-red-500 @enderror">
                @error('cover')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Action Buttons --}}
            <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                <a href="{{ route('admin.books.index') }}"
                    class="px-5 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 transition-all">
                    Cancel
                </a>
                <button type="submit"
                    class="px-5 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 transition-all">
                    Add Book
                </button>
            </div>
        </form>
    </div>
</div>
@endsection