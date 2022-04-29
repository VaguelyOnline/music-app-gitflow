@extends('layouts.main')

@section('content')

    @include('components.important-message', ['message' => "It's really important that you enter the correct data!"])

    <form action="">
        <input type="number" name="waiting">
        
    </form>

@endsection