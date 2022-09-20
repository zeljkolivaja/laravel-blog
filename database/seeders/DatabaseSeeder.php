<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
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
        User::truncate();
        Category::truncate();
        Post::truncate();


        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        $family = Category::create([
            'name' => 'Familly',
            'slug' => 'familly'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'Family post',
            'slug' => 'family-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'body' => '<p>Maecenas blandit lorem metus, nec varius felis pellentesque et. 
            Duis vestibulum nisi sem. Maecenas pretium massa vel libero volutpat, 
            sit amet sodales ipsum lobortis.
            Maecenas efficitur orci ante, ac ultricies diam laoreet vitae. 
            Maecenas posuere sem vitae semper euismod</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'Work post',
            'slug' => 'work-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'body' => '<p>Maecenas blandit lorem metus, nec varius felis pellentesque et. 
            Duis vestibulum nisi sem. Maecenas pretium massa vel libero volutpat, 
            sit amet sodales ipsum lobortis.
            Maecenas efficitur orci ante, ac ultricies diam laoreet vitae. 
            Maecenas posuere sem vitae semper euismod</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'Personal post',
            'slug' => 'personal-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'body' => '<p>Maecenas blandit lorem metus, nec varius felis pellentesque et. 
            Duis vestibulum nisi sem. Maecenas pretium massa vel libero volutpat, 
            sit amet sodales ipsum lobortis.
            Maecenas efficitur orci ante, ac ultricies diam laoreet vitae. 
            Maecenas posuere sem vitae semper euismod</p>'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
