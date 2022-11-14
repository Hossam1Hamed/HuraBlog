<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    
    public function run()
    {
        $faker = Factory::create();
        $posts = Post::all();
        foreach($posts as $post)
        {
            foreach(range(1,3) as $id)
            {
                $post->comments()->create([
                    'content'=>$faker->sentence(10),
                    'user_id'=>rand(1,10),
                ]);
            }
        }
    }
}
