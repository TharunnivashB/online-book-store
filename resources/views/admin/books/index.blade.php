@extends('layouts.app')

@section('title', 'Manage Books')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-800">Manage Books</h1>
        <a href="{{ route('admin.books.create') }}"
            class="bg-green-600 hover:bg-green-700 text-darkgreen px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
            <i class="fas fa-plus"></i>
            <span>Add New Book</span>
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($books as $book)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">{{ $book->title }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                            {{ $book->author }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                            ₹{{ number_format($book->price, 2) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end gap-3">
                                <a href="{{ route('admin.books.edit', $book) }}"
                                    class="text-blue-600 hover:text-blue-900 flex items-center gap-1">
                                    <i class="fas fa-edit text-sm"></i>
                                    <span class="hidden md:inline">Edit</span>
                                </a>
                                <form action="{{ route('admin.books.destroy', $book) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this book?')"
                                        class="text-red-600 hover:text-red-900 flex items-center gap-1">
                                        <i class="fas fa-trash text-sm"></i>
                                        <span class="hidden md:inline">Delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="bg-gray-50 px-6 py-3 border-t border-gray-200">
            {{ $books->links() }}
        </div>
    </div>
</div>
@endsection