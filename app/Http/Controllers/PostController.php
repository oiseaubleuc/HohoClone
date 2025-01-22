<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('dashboard', compact('posts'));
    }

        public function store(Request $request)
        {
            $request->validate([
                'content' => 'required|max:280',
            ]);

            Post::create([
                'content' => $request->input ('content'),
                'user_id' => auth()->id(),
            ]);

            return redirect()->route('dashboard');
        }
    public function like(Post $post)
    {
        $user = auth()->user();

        // Controleer of de gebruiker de post al geliked heeft
        if ($post->likes()->where('user_id', $user->id)->exists()) {
            $post->likes()->where('user_id', $user->id)->delete(); // Unlike
            return back()->with('message', 'You unliked the post.');
        }

        // Like de post
        $post->likes()->create(['user_id' => $user->id]);
        return back()->with('message', 'You liked the post.');
    }

    public function comment(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->input('content'), // Zorg dat 'content' overeenkomt met het formulier
        ]);

        return back()->with('message', 'Comment added.');
    }


    public function share(Post $post)
    {
        $sharedPost = $post->replicate();
        $sharedPost->user_id = auth()->id();
        $sharedPost->save();

        return back()->with('message', 'Post shared successfully.');
    }


}
