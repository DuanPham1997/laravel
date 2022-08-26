<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Post;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagCount = Tag::all()->count();
        if($tagCount === 0){
            $this->command->info('No Tag Found,skipping assigning tags to posts');
            return;
        }

        $howManyMin = (int)$this->command->ask('Minimum tags on posts',0);
        $howManyMax = (int)$this->command->ask('Maximum tags on posts',$tagCount);
        Post::all()->each(function(Post $post) use ($howManyMin,$howManyMax){
            $take = random_int($howManyMin,$howManyMax);
            $tags = Tag::inRandomOrder()->take($take)->get()->pluck('id');
            $post->tags()->sync($tags);
        });
    }
}
