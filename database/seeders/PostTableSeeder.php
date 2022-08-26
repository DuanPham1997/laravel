<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $postQuantity = (int)$this->command->ask('How many post do you want?',20);
        Post::factory($postQuantity)->make()->each(function($post) use ($users){
             $post->user_id = $users->random()->id;
             $post->save();
        });
    }
}
