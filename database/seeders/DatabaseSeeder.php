<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        User::factory()->create([
            'name' => 'John USers Doe',
            'email' => 'test@example.com',
            'username' => 'test_user'

        ]);
        $categories = [
            'Technology',
            'Health',
            'Science',
            'Sports',
            'Politics',
            'Entarteiment'
        ];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }

//        Post::factory(100)->create();
    }
}
