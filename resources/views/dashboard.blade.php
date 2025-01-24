@extends('layouts.layout')

@section('content')
    <!-- What's happening box -->
    <div class="bg-white rounded-lg shadow p-4 mb-6">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <textarea
                name="content"
                class="w-full border rounded-lg p-3 focus:outline-none"
                placeholder="What's happening?"
                required></textarea>
            <button type="submit" class="bg-blue-500 text-white mt-3 px-6 py-2 rounded-full hover:bg-blue-600">
                Tweet
            </button>
        </form>
    </div>

    <!-- Posts -->
    <div class="space-y-6">
        @forelse ($posts as $post)
            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex items-start space-x-4">
                    <img src="{{ $post->user->profile_picture ?? '/default-profile.png' }}" class="w-12 h-12 rounded-full" alt="Avatar">
                    <div>
                        <h3 class="font-bold">{{ $post->user->name }}</h3>
                        <p class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                        <p class="mt-2">{{ $post->content }}</p>
                        <div class="flex space-x-4 mt-3 text-blue-500">
                            <!-- Like Button -->
                            <form action="{{ route('posts.like', $post->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="flex items-center space-x-2">
                                    <i class="bi bi-heart"></i>
                                    <span>Like</span>
                                </button>
                            </form>
                            <!-- Comment Button -->
                            <button
                                class="flex items-center space-x-2"
                                onclick="document.getElementById('comment-{{ $post->id }}').classList.toggle('hidden')">
                                <i class="bi bi-chat"></i>
                                <span>Comment</span>
                            </button>
                            <!-- Retweet Button -->
                            <form action="{{ route('posts.share', $post->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="flex items-center space-x-2">
                                    <i class="bi bi-reply"></i>
                                    <span>Retweet</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Comment Section -->
                <div id="comment-{{ $post->id }}" class="mt-3 hidden">
                    <form action="{{ route('posts.comment', $post->id) }}" method="POST">
                        @csrf
                        <textarea
                            name="content"
                            class="w-full border rounded-lg p-2"
                            rows="2"
                            placeholder="Write a comment"
                            required></textarea>
                        <button type="submit" class="mt-2 bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-500">No posts yet.</p>
        @endforelse
    </div>
@endsection
