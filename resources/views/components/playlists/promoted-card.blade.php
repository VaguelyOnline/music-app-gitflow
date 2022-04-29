<div class="card bg-primary text-white playlist promoted">
    <div class="card-body">
        <p class="card-text">
            @foreach($playlist->songs as $song)
                <span>{{ $song->artists->first()->name }}</span>
                <span class="song-title">{{ $song->name }}</span> &middot;
            @endforeach
        </p>
        <h5 class="card-title">{{ ucfirst($playlist->name) }}</h5>
        <h6 class="card-subtitle mb-2">{{ $playlist->songs->count() }} songs</h6>
    </div>
</div>