@extends('layouts.main')

@section('content')

    <h1>
        Artists
    </h1>

    {{ $artists->links() }}

    <form action="{{ route('artists.index') }}" method="GET">
        <label class="form-label">Search: </label>    
        <input type="text" name="search" class="form-control">

        <button class="btn btn-outline-secondary">Search</button>
    </form>
    
    <ul>
        @foreach($artists as $artist)
            <li>
                <a href="{{ route('artists.show', $artist) }}">
                    {{ $artist->name }}

                    <strong>
                        {{ $artist->songs->count() }}
                    </strong>
                </a>
            </li>
        @endforeach
    </ul>

@endsection