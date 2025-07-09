<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /** ---------- LIST ---------- */
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create', ['book' => new Book()]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateBook($request);


        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')
                ->store('covers', 'public');
        }

        Book::create($validated);

        return redirect()->route('admin.books.index')
            ->with('success', 'Book added!');
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $this->validateBook($request, $book->id);

        if ($request->hasFile('cover')) {
            // delete old cover 
            if ($book->cover && Storage::disk('public')->exists($book->cover)) {
                Storage::disk('public')->delete($book->cover);
            }
            // store new file
            $validated['cover'] = $request->file('cover')
                ->store('covers', 'public');
        }

        $book->update($validated);

        return redirect()->route('admin.books.index')
            ->with('success', 'Book updated successfully.');
    }


    public function destroy(Book $book)
    {

        if ($book->cover && Storage::disk('public')->exists($book->cover)) {
            Storage::disk('public')->delete($book->cover);
        }

        $book->delete();
        return back()->with('success', 'Book deleted!');
    }

    private function validateBook(Request $request, $ignoreId = null): array
    {
        return $request->validate([
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'year'        => 'nullable|integer',
            'isbn'        => 'nullable|string|unique:books,isbn,' . $ignoreId,
            'description' => 'nullable|string',
            'cover'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'price'       => 'required|numeric|min:0',
            'in_stock'    => 'boolean',
        ]);
    }
}
