@extends('layouts.main')

@section('content')

    <h2>
        Details for: {{ $artist->name }}
    </h2>

    <h4>Songs ({{ $artist->songs->count() }} songs):</h4>

    <ol>
        @foreach($artist->songs->sortBy('name') as $song)
            <li>
                {{ $song->name }} ({{ $song->seconds }} seconds)
            </li>
        @endforeach
    </ol>

@endsection