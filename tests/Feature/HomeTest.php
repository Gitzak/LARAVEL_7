<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testHomePage()
    // {
    //     $response = $this->get('/home');

    //     $response->assertSeeText('Home Welcome');
    // }

    public function testSavePost()
    {
        $post          = new Post();
        $post->title   = "New title Test";
        $post->slug    = Str::slug($post->title, '-');
        $post->content = "New content Test";
        $post->active  = false;

        $post->save();

        $this->assertDatabaseHas('posts', [
            'title' => 'New title Test',
        ]);
    }

    // public function testPostStoreValid()
    // {
    //     $data = [
    //         'title'   => 'Post 2 valide',
    //         'content' => 'Post 2 valide content',
    //         'slug'    => Str::slug('Post 2 valide', '-'),
    //         'active'  => true,
    //     ];

    //     $this->post('/posts', $data)
    //         ->assertStatus(302)
    //         ->assertSessionHas('status');

    //     $this->assertEquals(session('status'), 'Post Was created!');

    // }

    // public function testPostStoreFail()
    // {
    //     $data = [
    //         'title'   => '',
    //         'content' => '',
    //     ];

    //     $this->post('/posts', $data)
    //         ->assertStatus(302)
    //         ->assertSessionHas('errors');

    //     $messages = session('errors')->getMessages();

    //     $this->assertEquals($messages['title'][0], 'The title field is required.');
    //     // $this->assertEquals($messages['title'][1],'The title must be at least 3 characters.');
    //     $this->assertEquals($messages['content'][0], 'The content field is required.');
    // }

    // public function testPostUpdate()
    // {
    //     $post          = new Post();
    //     $post->title   = "Second title Test";
    //     $post->slug    = Str::slug($post->title, '-');
    //     $post->content = "New content Test";
    //     $post->active  = true;

    //     $post->save();

    //     $this->assertDatabaseHas('posts', $post->toArray());

    //     $data = [
    //         'title'   => 'Post 2 valide updated',
    //         'content' => 'Post 2 valide content updated',
    //         'slug'    => Str::slug('Post 2 valide updated', '-'),
    //         'active'  => true,
    //     ];

    //     $this->put("/posts/{$post->id}", $data)
    //         ->assertStatus(302)
    //         ->assertSessionHas('status');

    //     // $this->assertEquals(session('status'), 'Post Was updated!');

    //     $this->assertDatabaseHas('posts', [
    //         'title' => $data['title'],
    //     ]);

    //     $this->assertDatabaseMissing('posts', [
    //         'title' => $post->title,
    //     ]);

    // }

    // public function testPostDelete()
    // {
    //     $post          = new Post();
    //     $post->title   = "New title Test";
    //     $post->slug    = Str::slug($post->title, '-');
    //     $post->content = "New content Test";
    //     $post->active  = true;

    //     $post->save();

    //     $this->assertDatabaseHas('posts', [
    //         'title' => 'New title Test',
    //     ]);

    //     $this->assertDatabaseHas('posts', $post->toArray());

    //     $this->delete("/posts/{$post->id}")
    //         ->assertStatus(302)
    //         ->assertSessionHas('status');

    //     $this->assertDatabaseMissing('posts', [
    //         $post->toArray()
    //     ]);
    // }
}
