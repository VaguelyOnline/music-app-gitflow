@extends('layouts.main')

@section('content')

    <h2>Relationship Instructions</h2>

    <p>Need to define the relationships between your models? Have no fear! Eloquent to the rescue!</p>

    <a href="{{ route('artists.index') }}" type="button" class="btn btn-outline-primary">View artists</a>

    <ol>
        <li>
            Determine what the type of relationship is (o2o, o2m, m2m)
        </li>
        <li>
            Go to the official docs - laravel.com
        </li>
        <li>
            From the docs, determine: what column to create in a table? Or what pivot table to create (for many-to-many relationships)?
        </li>
        <li>
            Created / modify a table(s) to they support relationship. Do this in a migration.
        </li>
        <li>
            In the model classes, defined the relationship method.
        </li>
        <li>
            Have fun! 'Travel' through the relationships via the relationship methods - e.g.: $artist->songs .  Or $song->artists .
        </li>
    </ol>

@endsection