<?php

use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagsCount = Tag::count();

        Post::All()->each(function($post) use($tagsCount){
            $take = random_int(1, $tagsCount);

            $tagIds = Tag::inRandomOrder()->take($take)->get()->pluck('id');

            $post->tags()->sync($tagIds);
        });
    }
}
