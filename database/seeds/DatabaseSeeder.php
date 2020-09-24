<?php

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
        // $this->call(UserSeeder::class);

        if ($this->command->confirm("Do you want to refresh the database ?", true)) {
            $this->command->call("migrate:refresh");
            $this->command->info("Database was refreshed !");
            $this->call([
                UsersSeeder::class,
                PostsSeeder::class,
                CommentsSeeder::class,
                TagTableSeeder::class,
                PostTagTableSeeder::class,
            ]);
        }

        // create 10 users
        // $users = factory(App\User::class,10)->create();

        // // create posts
        // $posts = factory(App\Post::class,100)->make()->each(function($post) use ($users){
        //     $post->user_id = $users->random()->id;
        //     $post->save();
        // });

        // factory(App\Comment::class,800)->make()->each(function($comment) use ($posts){
        //     $comment->post_id = $posts->random()->id;
        //     $comment->save();
        // });

    }
}
