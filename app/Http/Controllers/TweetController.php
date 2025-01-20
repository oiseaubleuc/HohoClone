<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tweets = Tweet::with('user')->latest()->get();
        return view('tweets.index', compact('tweets'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tweets.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['body' => 'required|max:280']);

        Tweet::create([
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('tweets.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tweet $tweet)
    {
        $this->authorize('update', $tweet);
        return view('tweets.edit', compact('tweet'));
    }

    public function update(Request $request, Tweet $tweet)
    {
        $this->authorize('update', $tweet);

        $request->validate(['body' => 'required|max:280']);
        $tweet->update(['body' => $request->body]);

        return redirect()->route('tweets.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet)
    {
        $this->authorize('delete', $tweet);
        $tweet->delete();

        return redirect()->route('tweets.index');
    }

}
