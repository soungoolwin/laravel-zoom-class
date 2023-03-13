<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(10)->create();
        Category::factory()->create(['name'=>'frontend', 'slug'=>'frontend']);
        Category::factory()->create(['name'=>'backend', 'slug'=>'backend']);
        Blog::factory(5)->create(['category_id'=>1, 'user_id'=>3]);
        Blog::factory(5)->create(['category_id'=>2, 'user_id'=>7]);
    }
}
