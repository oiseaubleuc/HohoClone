@extends('layouts.app')

@section('content')
    <h1>Nieuwe Tweet</h1>

    <form action="{{ route('tweets.store') }}" method="POST">
        @csrf
        <textarea name="body" rows="3" placeholder="Wat is er nieuw?" required></textarea>
        <button type="submit">Tweet</button>
    </form>
@endsection
