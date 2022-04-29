@extends('layouts.main')

@section('content')

    <h1>
        @if(count($buses) != 1)
            Here are the bus routes:
        @else
            Here is the bus route:
        @endif
    </h1>

    @foreach($buses as $id => $bus)
        @include('components.bus.summary', compact('bus', 'id'))
    @endforeach

    @empty($buses)
        <p>
            There are no buses
        </p>
    @endempty


@endsection