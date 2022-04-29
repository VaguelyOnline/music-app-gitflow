@extends('layouts.main')

@section('content')
    <h3>
        This is the data: {{ $name }}
    </h3>

    @include('components.important-message', compact('message'))

@endsection