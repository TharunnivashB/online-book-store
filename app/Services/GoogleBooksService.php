<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GoogleBooksService
{
    public function search($query)
    {
        $apiKey = config('services.google.books_key');

        $params = ['q' => $query, 'maxResults' => 5];
        if ($apiKey) {
            $params['key'] = $apiKey;
        }

        $response = Http::get('https://www.googleapis.com/books/v1/volumes', $params);

        if ($response->successful()) {
            return $response->json()['items'] ?? [];
        }

        return [];
    }
}
