@extends('layouts.main')

@section('content')

    <h2>Tell us about a new Artist</h2>

    <form action="/artists" method="POST">
    <form action="{{ route('artists.store') }}" method="POST">
        @csrf

        <label>Name</label>
        <input type="text" name="name" placeholder="Enter the artists name"> <br>

        <label>Description</label>
        <input type="text" name="description" placeholder="Describe them"> <br>

        <label>Image URL</label>
        <input type="text" name="image" placeholder="E.g., https://example.com/image.jpg"> <br>

        <button>Save</button>

    </form>

@endsection