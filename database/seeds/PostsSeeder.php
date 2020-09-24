<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // get all users
        $users = App\User::all();

        if($users->count() == 0){
            $this->command->info('Makynach data dyal users');
            return;
        }
        // create posts
        $nmbPosts = (int)$this->command->ask('Ch7am men Post bari tssayb ?', 10);

        factory(App\Post::class,$nmbPosts)->make()->each(function($post) use ($users){
            $post->user_id = $users->random()->id;
            $post->save();
        });
    }
}
