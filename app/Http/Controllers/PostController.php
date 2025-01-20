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
                'content' => $request->Content,
                'user_id' => auth()->id(),
            ]);

            return redirect()->back();
        }

}
