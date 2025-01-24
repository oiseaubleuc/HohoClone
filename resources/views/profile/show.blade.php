@extends('layouts.layout')

@section('content')
    <div class="bg-gray-900 text-white rounded-lg shadow p-6 mb-6">
        <!-- Banner and Profile Info -->
        <div class="relative">
            <!-- Banner -->
            <div class="h-40 bg-gradient-to-r from-blue-500 to-blue-700 rounded-lg"></div>

            <!-- Profile Picture -->
            <div class="absolute top-20 left-6">
                <img src="{{ $user->profile_picture ?? '/default-profile.png' }}" alt="Avatar"
                     class="w-28 h-28 rounded-full border-4 border-gray-900 shadow-lg">
            </div>
        </div>

        <!-- User Info -->
        <div class="mt-16 ml-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-extrabold">{{ $user->name }}</h2>
                    <p class="text-gray-400">@{{ $user->username }}</p>
                </div>
                <a href="{{ route('profile.edit') }}" class="bg-gray-800 hover:bg-gray-700 text-white py-2 px-4 rounded-lg shadow">
                    Edit Profile
                </a>

            </div>

            <p class="mt-4 text-lg">{{ $user->bio ?? 'No bio available.' }}</p>

            <div class="flex items-center text-gray-400 mt-2">
                <p class="mr-4"><i class="fas fa-map-marker-alt"></i> {{ $user->location ?? 'No location provided' }}</p>
                <p class="mr-4"><i class="fas fa-link"></i> <a href="{{ $user->website }}" target="_blank"
                                                               class="text-blue-400 hover:underline">{{ $user->website }}</a></p>
                <p><i class="fas fa-calendar-alt"></i> Joined {{ $user->created_at->format('F Y') }}</p>
            </div>

            <div class="flex items-center mt-4 text-gray-400">
                <p class="mr-4"><span class="text-white font-bold">{{ $user->following_count }}</span> Following</p>
                <p><span class="text-white font-bold">{{ $user->followers_count }}</span> Followers</p>
            </div>
        </div>
    </div>

    <!-- User's Tweets -->
    <div class="space-y-6">
        @forelse ($user->posts as $post)
            <div class="bg-gray-800 text-white rounded-lg shadow p-4">
                <div class="flex items-start space-x-4">
                    <img src="{{ $user->profile_picture ?? '/default-profile.png' }}" alt="Avatar"
                         class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-bold text-lg">{{ $user->name }}</h3>
                        <p class="text-gray-400 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                        <p class="mt-2 text-gray-100">{{ $post->content }}</p>
                        <div class="flex space-x-6 mt-3 text-blue-500">
                            <!-- Like Button -->
                            <form action="{{ route('posts.like', $post->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="flex items-center space-x-2 hover:text-blue-300">
                                    <i class="fas fa-heart"></i>
                                    <span>Like {{ $post->likes_count }}</span>
                                </button>
                            </form>

                            <!-- Comment Button -->
                            <button
                                class="flex items-center space-x-2 hover:text-blue-300"
                                onclick="document.getElementById('comment-{{ $post->id }}').classList.toggle('hidden')">
                                <i class="fas fa-comment"></i>
                                <span>Comment</span>
                            </button>

                            <!-- Retweet Button -->
                            <form action="{{ route('posts.share', $post->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="flex items-center space-x-2 hover:text-blue-300">
                                    <i class="fas fa-retweet"></i>
                                    <span>Retweet</span>
                                </button>
                            </form>
                        </div>

                        <!-- Comment Section -->
                        <div id="comment-{{ $post->id }}" class="mt-3 hidden">
                            <form action="{{ route('posts.comment', $post->id) }}" method="POST">
                                @csrf
                                <textarea
                                    name="content"
                                    class="w-full border rounded-lg p-3 text-gray-700 focus:outline-none"
                                    rows="2"
                                    placeholder="Write a comment"></textarea>
                                <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-400">No tweets yet.</p>
        @endforelse
    </div>
@endsection
