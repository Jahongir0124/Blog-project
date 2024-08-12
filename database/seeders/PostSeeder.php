<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Post;


class PostSeeder extends Seeder
{
    
    public function run()
    {
        Post::create([
            'user_id' => 1,
            'title' => 'Yangi Post',
            'short_content' => 'Short Content',
            'content' => 'Content',
            'photo' => '/df/ggfg/sds'
        ]);
        Post::create([
            'user_id' => 1,
            'title' => 'Yangi Post',
            'short_content' => 'Short Content',
            'content' => 'Content',
            'photo' => '/df/ggfg/sds'
        ]);
        Post::create([
            'user_id' => 1,
            'title' => 'Yangi Post',
            'short_content' => 'Short Content',
            'content' => 'Content',
            'photo' => '/df/ggfg/sds'
        ]);
    }
}
