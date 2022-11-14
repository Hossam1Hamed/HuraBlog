<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    
    public function run()
    {
        $faker = Factory::create();
        $users = User::all();
        foreach($users as $user)
        {
            foreach(range(1,2) as $id)
            {
                $user->posts()->create([
                    'title'=>$faker->word(8),
                    'content'=>$faker->sentence(30),
                ]);
            }
        }
    }
}
