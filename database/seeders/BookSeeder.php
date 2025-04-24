<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            Book::create([
                'title' => 'Sample Book in ' . $category->name,
                'author' => 'Author ' . rand(1, 100),
                'description' => 'This is a sample description for a book in the ' . $category->name . ' category.',
                'category_id' => $category->id,
            ]);
        }
    }
}
