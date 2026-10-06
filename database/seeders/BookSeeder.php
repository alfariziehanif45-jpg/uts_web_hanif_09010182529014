<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $cat = Category::pluck('id', 'name');

        $books = [
            [
                'category_id' => $cat['Pemrograman'],
                'title'       => 'Belajar Laravel untuk Pemula',
                'author'      => 'Andi Wijaya',
                'publisher'   => 'Informatika',
                'year'        => 2022,
                'stock'       => 10,
            ],
            [
                'category_id' => $cat['Pemrograman'],
                'title'       => 'Pemrograman PHP Modern',
                'author'      => 'Budi Santoso',
                'publisher'   => 'Andi Offset',
                'year'        => 2021,
                'stock'       => 7,
            ],
            [
                'category_id' => $cat['Basis Data'],
                'title'       => 'Dasar-Dasar MySQL',
                'author'      => 'Citra Lestari',
                'publisher'   => 'Elex Media',
                'year'        => 2020,
                'stock'       => 5,
            ],
            [
                'category_id' => $cat['Basis Data'],
                'title'       => 'Perancangan Basis Data Relasional',
                'author'      => 'Dewi Anggraini',
                'publisher'   => 'Graha Ilmu',
                'year'        => 2019,
                'stock'       => 4,
            ],
            [
                'category_id' => $cat['Jaringan'],
                'title'       => 'Jaringan Komputer Praktis',
                'author'      => 'Eko Prasetyo',
                'publisher'   => 'Informatika',
                'year'        => 2023,
                'stock'       => 8,
            ],
        ];

        foreach ($books as $book) {
            Book::updateOrCreate(['title' => $book['title']], $book);
        }
    }
}