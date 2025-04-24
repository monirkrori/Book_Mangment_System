<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // إنشاء 10 مؤلفين
        \App\Models\Author::factory(10)->create();

        // إنشاء 5 فئات
        \App\Models\Category::factory(5)->create();

        // إنشاء 50 كتاب مع ربطهم عشوائياً بالمؤلفين والفئات
        \App\Models\Book::factory(50)->create();
    }
}
