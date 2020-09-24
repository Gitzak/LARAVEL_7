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
        $posts = App\Post::all();

        if($posts->count() == 0){
            $this->command->info('Makynach data dyal Posts');
            return;
        }

        $nmbComments = (int)$this->command->ask('Ch7am men Comment bari tssayb ?', 10);

        factory(App\Comment::class,$nmbComments)->make()->each(function($comment) use ($posts){
            $comment->post_id = $posts->random()->id;
            $comment->save();
        });
    }
}
