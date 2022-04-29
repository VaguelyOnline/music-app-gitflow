@extends('layouts.main')

@section('content')

    <h2>
        You are viewing: <strong>{{ $artist->name }}</strong>
    </h2>

    <h4>Songs the artist has made: ({{ $artist->songs->count() }} songs):</h4>

    <ol>
        @foreach($artist->songs->sortBy('name') as $song)
            <li>
                {{ $song->name }} ({{ $song->seconds }} seconds)
            </li>
        @endforeach
    </ol>

@endsection