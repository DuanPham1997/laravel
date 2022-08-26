<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userQuantity = (int) $this->command->ask('How many user do you want?',10);
        User::factory($userQuantity)->create();
    }
}
