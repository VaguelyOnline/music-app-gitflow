@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2> 
                @if($search)
                    Seaching
                @endif
                Playlists
            </h2>
        </div>
        <div class="col-6">
            <form action="#">

                <div class="row">
                    <div class="col-md-7">
                        <div class="input-group">
                            <span class="input-group-text">🔎</span>
                            <input value="{{ $search }}" name="search" type="text" class="form-control" placeholder="Search in playlists" aria-label="Search playlists">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="dropdown float-end">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Most relevant
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Most relevant</a></li>
                                <li><a class="dropdown-item" href="#">Recently played</a></li>
                                <li><a class="dropdown-item" href="#">Recently added</a></li>
                                <li><a class="dropdown-item" href="#">Alphabetical</a></li>
                                <li><a class="dropdown-item" href="#">Custom</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

    {{ $playlists->links() }}

    @if($search)
        <p>
            <a href="{{ route('playlists.index') }}">Show all playlists</a>
        </p>
    @endif

    <div class="row">
        <div class="col">
            <form action="#">

                <input type="file" name="image" class="form-control"> Select Image

            </form>
        </div>
    </div>

    <div class="row">
        @if($promoted)
            <div class="col-md-6">
                @include('components.playlists.promoted-card', ['playlist' => $promoted])
            </div>
        @endif

        @foreach($playlists as $playlist)
            <div class="col-md-3">
                @include('components.playlists.summary-card', compact('playlist'))
            </div>
        @endforeach

        @if($playlists->count() == 0)
            <div class="alert alert-info show">
                <h4>There are no playlists to display</h4>
            </div>
        @endif
    </div>

@endsection