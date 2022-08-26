<?php

namespace Database\Seeders;

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
        if($this->command->confirm('Do you want refresh database?',true)){
           $this->command->call('migrate:refresh');
           $this->command->info('Database was refrehed!');
        }

        $this->call([
            UserTableSeeder::class,
            PostTableSeeder::class,
            CommentTableSeeder::class,
            TagsTableSeeder::class,
            PostTagTableSeeder::class
        ]);
    }
}
