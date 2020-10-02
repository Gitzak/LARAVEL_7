<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // get all posts
        // $posts = App\Post::all();

        // // get all user
        // $users = App\User::all();


        // if($posts->count() == 0){
        //     $this->command->info('Makynach data dyal Posts');
        //     return;
        // }

        // $nmbComments = (int)$this->command->ask('Ch7am men Comment bari tssayb ?', 10);

        // factory(App\Comment::class,$nmbComments)->make()->each(function($comment) use ($posts, $users){
        //     $comment->post_id = $posts->random()->id;
        //     $comment->user_id = $users->random()->id;
        //     $comment->save();
        // });


        $posts = App\Post::all();
        $users = App\User::all();

        if ($posts->count() === 0 || $users->count() === 0) {
            $this->command->info('There are no posts or users, so no comments will be added');
            return;
        }

        $commentsCount = (int)$this->command->ask('How many comments would you like?', 150);

        factory(App\Comment::class, $commentsCount)->make()->each(function ($comment) use ($posts, $users) {
            $comment->commentable_id = $posts->random()->id;
            $comment->commentable_type = 'App\Post';
            $comment->user_id = $users->random()->id;
            $comment->save();
        });

        factory(App\Comment::class, $commentsCount)->make()->each(function ($comment) use ($users) {
            $comment->commentable_id = $users->random()->id;
            $comment->commentable_type = 'App\User';
            $comment->user_id = $users->random()->id;
            $comment->save();
        });
    }
}
