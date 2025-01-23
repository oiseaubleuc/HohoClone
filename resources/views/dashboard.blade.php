@extends('layouts.layout')

@section('content')
    <h3 class="mb-4">Home</h3>

    <!-- Post Form -->
    <div class="card post-card p-3 mb-4">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea
                    name="content"
                    class="form-control"
                    rows="3"
                    placeholder="What is happening?"
                    required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post</button>
        </form>
    </div>

    <!-- Display Posts -->
    <div>
        <p class="text-muted">Showing {{ $posts->count() }} Posts</p>

        @forelse ($posts as $post)
            <div class="card post-card p-3 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <img src="{{ asset('img/default-avatar.png') }}" alt="Avatar" class="rounded-circle" style="width: 50px; height: 50px;">
                    <div class="ms-3">
                        <h5 class="mb-0">{{ $post->user->name }}</h5>
                        <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                    </div>
                </div>
                <p>{{ $post->content }}</p>

                <div class="d-flex align-items-center justify-content-between">
                    <!-- Like Button -->
                    <form action="{{ route('posts.like', $post->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link text-primary">
                            ❤️ {{ $post->likes_count }}
                        </button>
                    </form>

                    <!-- Comment Button -->
                    <button
                        class="btn btn-link text-primary"
                        onclick="document.getElementById('comment-{{ $post->id }}').classList.toggle('d-none')">
                        💬 Comment
                    </button>

                    <!-- Retweet Button -->
                    <form action="{{ route('posts.share', $post->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link text-primary">
                            🔄 Retweet
                        </button>
                    </form>
                </div>

                <!-- Comment Section -->
                <div id="comment-{{ $post->id }}" class="mt-3 d-none">
                    <form action="{{ route('posts.comment', $post->id) }}" method="POST">
                        @csrf
                        <textarea
                            name="content"
                            class="form-control mb-2"
                            rows="2"
                            placeholder="Write a comment"
                            required></textarea>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center text-muted">No posts yet.</div>
        @endforelse
    </div>
@endsection
