@extends('layouts.layout')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center space-x-4">
            <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : '/default-profile.png' }}"
                 alt="Profielfoto" class="w-24 h-24 rounded-full">
            <div>
                <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                <p class="text-gray-600">{{ $user->bio ?? 'Geen bio beschikbaar.' }}</p>
                <p class="text-gray-600"><i class="fas fa-map-marker-alt"></i> {{ $user->location ?? 'Geen locatie opgegeven.' }}</p>
            </div>
        </div>

        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="bio" class="block text-gray-700">Bio:</label>
                <textarea name="bio" id="bio" rows="3" class="w-full border-gray-300 rounded-md">{{ old('bio', $user->bio) }}</textarea>
            </div>
            <div class="mb-4">
                <label for="location" class="block text-gray-700">Locatie:</label>
                <input type="text" name="location" id="location" value="{{ old('location', $user->location) }}" class="w-full border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="profile_picture" class="block text-gray-700">Profielfoto:</label>
                <input type="file" name="profile_picture" id="profile_picture" class="block w-full">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Opslaan</button>
        </form>
    </div>
@endsection
