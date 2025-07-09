<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Book::factory()->count(50)->create();

        \App\Models\Book::create([
            'title' => 'Sample Book',
            'author' => 'John Doe',
            'cover' => 'https://picsum.photos/150/200',
        ]);
    }
}
