<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $post =  Post::all();
         $commentQuantity = $this->command->ask('how many comment do you want?',30);

         Comment::factory($commentQuantity)->make()->each(function($comment) use ($post){
             $comment->post_id = $post->random()->id;
             $comment->save();
         });
    }
}
