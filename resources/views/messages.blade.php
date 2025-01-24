@extends('layouts.layout')

@section('content')
    <div class="bg-gray-900 text-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Messages</h1>
            <button
                onclick="document.getElementById('addMessageModal').classList.remove('hidden')"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Add Message
            </button>
        </div>

        <!-- Messages List -->
        @if($messages)
            <div class="space-y-4">
                @foreach($messages as $message)
                    <div class="bg-gray-800 rounded-lg p-4 shadow">
                        <div class="flex items-center justify-between">
                            <h3 class="font-bold">{{ $message['sender'] }}</h3>
                            <span class="text-gray-400 text-sm">{{ $message['time'] }}</span>
                        </div>
                        <p class="mt-2">{{ $message['content'] }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-400">No messages yet.</p>
        @endif
    </div>

    <!-- Add Message Modal -->
    <div id="addMessageModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white text-black rounded-lg shadow-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Send a Message</h2>
                <button
                    onclick="document.getElementById('addMessageModal').classList.add('hidden')"
                    class="text-gray-500 hover:text-gray-700">
                    &times;
                </button>
            </div>
            <form action="{{ route('messages.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block text-sm font-bold mb-2">Username</label>
                    <input
                        type="text"
                        name="username"
                        id="username"
                        class="w-full border rounded-lg p-2"
                        placeholder="Enter recipient's username"
                        required>
                </div>
                <div class="mb-4">
                    <label for="subject" class="block text-sm font-bold mb-2">Subject</label>
                    <input
                        type="text"
                        name="subject"
                        id="subject"
                        class="w-full border rounded-lg p-2"
                        placeholder="Enter the subject"
                        required>
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-sm font-bold mb-2">Message</label>
                    <textarea
                        name="content"
                        id="content"
                        class="w-full border rounded-lg p-2"
                        rows="4"
                        placeholder="Write your message"
                        required></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="document.getElementById('addMessageModal').classList.add('hidden')"
                            class="bg-gray-300 text-black px-4 py-2 rounded-lg mr-2 hover:bg-gray-400">
                        Cancel
                    </button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Send
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
