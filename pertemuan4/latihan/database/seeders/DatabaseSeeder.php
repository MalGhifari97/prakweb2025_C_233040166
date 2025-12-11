<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Membuat 5 User
    $users = User::factory(5)->create();

    // Membuat 5 Category
    $categories = Category::factory(5)->create();

    // Membuat 10 Post, menggunakan user dan category yang baru dibuat
    Post::factory(10)->recycle($users)->recycle($categories)->create();
}
}