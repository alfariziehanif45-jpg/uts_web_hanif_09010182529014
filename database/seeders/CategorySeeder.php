<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Pemrograman', 'description' => 'Buku seputar bahasa pemrograman dan pengembangan perangkat lunak.'],
            ['name' => 'Basis Data',  'description' => 'Buku seputar perancangan dan pengelolaan basis data.'],
            ['name' => 'Jaringan',    'description' => 'Buku seputar jaringan komputer dan keamanan.'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['name' => $category['name']], $category);
        }
    }
}