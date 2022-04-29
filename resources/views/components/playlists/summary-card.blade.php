<div class="card playlist">
    <img src="{{ $playlist->image }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('playlists.show', $playlist) }}">
                {{ $playlist->name }}
            </a>
        </h5>
        <h5 class="card-subtitle">{{ $playlist->subtitle }}</h5>
    </div>
</div>