<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $hits = [];

        if ($request->has('q')) {
            $query = $request->input('q');

            $response = Http::get("https://www.googleapis.com/books/v1/volumes", [
                'q' => $query
            ]);

            if ($response->successful()) {
                $booksFromApi = $response->json()['items'] ?? [];

                foreach ($booksFromApi as $item) {
                    $hits[] = [
                        'title' => $item['volumeInfo']['title'] ?? 'No title',
                        'author' => $item['volumeInfo']['authors'][0] ?? 'Unknown',
                        'cover' => $item['volumeInfo']['imageLinks']['thumbnail'] ?? null,
                    ];
                }
            }
        }

        $hits = collect($hits);

       
        $books = Book::latest()->take(8)->get();

        return view('home', compact('hits', 'books'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
