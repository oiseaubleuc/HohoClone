@extends('layouts.app')

@section('content')
    <h1>Tweet Bewerken</h1>

    <form action="{{ route('tweets.update', $tweet->id) }}" method="POST">
        @csrf
        @method('PUT')
        <textarea name="body" rows="3" required>{{ $tweet->body }}</textarea>
        <button type="submit">Opslaan</button>
    </form>
@endsection
