<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nmbUsers = (int)$this->command->ask('Ch7am men user bari tssayb ?', 10);
        $users = factory(App\User::class,$nmbUsers)->create();
    }
}
