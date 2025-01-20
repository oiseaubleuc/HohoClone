<x-app-layout>
    <nav class="bg-gray-900 text-white px-4 py-2 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <a href="{{ route('dashboard') }}" class="text-lg font-bold hover:text-blue-500">Home</a>
            <a href="{{ route('profile.edit') }}" class="text-lg hover:text-blue-500">Profile</a>
        </div>
    </nav>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @auth

                <div class="bg-white dark:bg-gray-800 p-6 shadow-sm rounded-lg mb-6">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <textarea
                            name="content"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                            rows="3"
                            placeholder="What's on your mind?"
                            required></textarea>
                        <button type="submit" class="mt-3 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Post
                        </button>



                    </form>
                </div>

                @forelse ($posts as $post)
                    <div class="bg-white dark:bg-gray-800 p-4 shadow-sm rounded-lg mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gray-300 dark:bg-gray-700 rounded-full"></div>
                            <div class="ml-4">
                                <h4 class="font-bold">{{ $post->user->name }}</h4>
                                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <p class="mt-2 dark:text-gray-100">{{ $post->content }}</p>
                    </div>
                @empty
                    <p class="text-center text-gray-500 dark:text-gray-400">No posts yet.</p>
                @endforelse
            @else

                <div class="bg-red-500 text-white p-4 rounded-lg text-center">
                    Please log in to post and view content.
                </div>
            @endauth
        </div>
    </div>
</x-app-layout>
