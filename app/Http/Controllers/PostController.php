<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth')->only(['create','edit','update','destroy']);
        $this->middleware('auth')->except(['index','show','archive','all']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $mostCommented = Cache::remember('mostCommented', now()->addSeconds(10), function () {
        //     return Post::mostCommented()->take(5)->get();
        // });

        // $mostUserActive = Cache::remember('mostUserActive', now()->addSeconds(10), function () {
        //     return User::mostUserActive()->take(5)->get();
        // });

        // $mostUserActiveInLastMonth = Cache::remember('mostUserActiveInLastMonth', now()->addSeconds(10), function () {
        //     return User::mostUserActiveInLastMonth()->take(5)->get();
        // });

        // DB::enableQueryLog();

        // $posts = Post::all();
        // $posts = Post::find(2);


        // $posts = Post::with('comments')->get();

        // foreach($posts as $post){
        //     // ->comments c'est une méthode dans le Model Post
        //     foreach($post->comments as $comment){
        //         dump($comment);
        //     }
        // }
    
        // dd(DB::GetQueryLog());

        // dd(User::mostUserActive()->take(5)->get());

        // dd($posts->tags);

        // dd(\App\Post::all());
        return view('posts.index', [
            // 'posts' => Post::all(),
            // 'posts' => Post::withCount('comments')->orderBy('updated_at','DESC')->get(),
            // 'posts' => Post::withCount('comments')->with('user')->with('tags')->get(),
            'posts' => Post::PostWithUserCommentsTags()->get(),
            // 'mostCommented' => $mostCommented,
            // 'mostUserActive' => $mostUserActive,
            // 'mostUserActiveInLastMonth' => $mostUserActiveInLastMonth,
            'tab' => 'list'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archive()
    {
        return view('posts.index', [
            // 'posts' => Post::onlyTrashed()->withCount('comments')->orderBy('updated_at','DESC')->get(),
            'posts' => Post::onlyTrashed()->withCount('comments')->with('user')->get(),
            'mostCommented' => Post::mostCommented()->take(5)->get(),
            'mostUserActive' => User::mostUserActive()->take(5)->get(),
            'mostUserActiveInLastMonth' => User::mostUserActiveInLastMonth()->take(5)->get(),
            'tab' => 'archive'
        ]);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return view('posts.index', [
            // 'posts' => Post::withTrashed()->withCount('comments')->orderBy('updated_at','DESC')->get(),
            'posts' => Post::withTrashed()->withCount('comments')->with('user')->get(),
            'mostCommented' => Post::mostCommented()->take(5)->get(),
            'mostUserActive' => User::mostUserActive()->take(5)->get(),
            'mostUserActiveInLastMonth' => User::mostUserActiveInLastMonth()->take(5)->get(),
            'tab' => 'all'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create');
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(StorePost $request)
    {
        // dd($request->all());

        // $validateData = $request->validate([
        //     'title' => 'required|min:3|max:20',
        //     'content' => 'required|min:3|max:144'
        // ]);

        // $post = new Post();
        // $post->title = $request->input('title');
        // $post->content = $request->input('content');
        // $post->slug = Str::slug($post->title, '-');
        // $post->active = false;
        // $post->save();

        
        $data = $request->only([
            'title',
            'content',
            ]);

        $data['user_id'] = $request->user()->id;
            
        $data['slug']   = Str::slug($data['title'], '-');
        $data['active'] = false;
        $post           = Post::create($data);

        // dd($title, 'content '.$content);
        // dd('Done !');
        // return redirect('/posts');
        $request->session()->flash('status', 'Post Was created!');

        return redirect()->route('posts.index');

        // return redirect()->route('posts.show', ['post' => $post->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postShow = Cache::remember("post-show-{$id}", 60, function () use($id) {
            return Post::with('comments','tags','comments.user')->findOrFail($id);
        });
        // dd(\App\Post::find($id));
        return view('posts.show', [
            // 'post' => Post::with('comments')->findOrFail($id),
            'post' => $postShow,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('update', $post);


        // if(Gate::denies('post.update',$post)){
        //     abort(403, 'You can\'t Edit this post');
        // }

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $post = Post::findOrFail($id);

        // if(Gate::denies('post.update',$post)){
        //     abort(403, 'You can\'t Edit this post');
        // }

        // $this->authorize('post.update', $post);
        $this->authorize('update', $post);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->slug = Str::slug($post->title, '-');
        $post->save();
        $request->session()->flash('status', 'Post Was updated!');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('delete', $post);

        $post->delete();

        // Post::destroy($id);

        // $this->authorize('post.delete', $post);
        $this->authorize('delete', $post);

        $request->session()->flash('status', 'Post Was deleted!');
        return redirect()->route('posts.index');
    }

    public function restore($id)
    {
       $post = Post::onlyTrashed()->where('id', $id)->first();

       $this->authorize('restore', $post);

       $post->restore();
       return redirect()->back();
    }

    public function forcedelete($id)
    {
       $post = Post::onlyTrashed()->where('id', $id)->first();

       $this->authorize('forcedelete', $post);

       // delete physique
       $post->forceDelete();
       return redirect()->back();
    }
}
