<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LikesSeeder extends Seeder
{

    public function run()
    {
        $posts = Post::all();
        $users = User::all();
        foreach($posts as $post)
        {
            foreach($users as $user)
            {
                DB::table('likes')->insert([
                    'user_id' => $user->id,
                    'post_id' => $post->id,
                ]);
            }
        }
    }
}
