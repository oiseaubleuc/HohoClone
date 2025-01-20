<x-app-layout>
    <div class="container-fluid p-0">
        <!-- Sidebar -->
        <div class="d-flex">
            <nav class="bg-dark text-white vh-100" style="width: 250px;">
                <div class="p-4">
                    <h4 class="text-white mb-4">Laravel</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a href="{{ route('dashboard') }}" class="nav-link text-white">
                                <i class="bi bi-house-door-fill"></i> Home
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{ route('profile.edit') }}" class="nav-link text-white">
                                <i class="bi bi-person-fill"></i> Profile
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <form action="{{ route('posts.store') }}" method="POST">
                                @csrf
                                <textarea name="content" required></textarea>
                                <button type="submit">Post</button>
                            </form>

                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="w-100 p-4 bg-light">
                @auth
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('posts.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                <textarea
                                    name="content"
                                    class="form-control"
                                    rows="3"
                                    placeholder="What's on your mind?"
                                    required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Post</button>
                            </form>
                        </div>
                    </div>

                    @forelse ($posts as $post)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="rounded-circle bg-secondary" style="width: 50px; height: 50px;"></div>
                                    <div class="ms-3">
                                        <h5 class="mb-0">{{ $post->user->name }}</h5>
                                        <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                                <p>{{ $post->content }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted">No posts yet.</div>
                    @endforelse
                @else
                    <div class="alert alert-warning text-center">Please log in to post and view content.</div>
                @endauth
            </div>
        </div>
    </div>
</x-app-layout>
