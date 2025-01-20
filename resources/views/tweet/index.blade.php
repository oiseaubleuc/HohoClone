@extends('layouts.app')

@section('content')
    <h1>Tweets</h1>
    <a href="{{ route('tweets.create') }}">Nieuwe Tweet</a>

    <ul>
        @foreach ($tweets as $tweet)
            <li>
                <strong>{{ $tweet->user->name }}</strong>: {{ $tweet->body }}
                <p><small>{{ $tweet->created_at->diffForHumans() }}</small></p>
                @can('update', $tweet)
                    <a href="{{ route('tweets.edit', $tweet->id) }}">Bewerken</a>
                @endcan
                @can('delete', $tweet)
                    <form action="{{ route('tweets.destroy', $tweet->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Verwijderen</button>
                    </form>
                @endcan
            </li>
        @endforeach
    </ul>
@endsection
