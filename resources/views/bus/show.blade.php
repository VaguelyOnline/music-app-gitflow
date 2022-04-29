@extends('layouts.main')

@section('content')

    <h1>Bus details</h1>

    @include('components.bus.summary', compact('bus', 'id'))

    <a href="{{ route('buses.index') }}">View all bus routes</a>

@endsection