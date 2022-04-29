<?php

namespace App\Policies;

use App\Models\Playlist;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Builder;

class PlaylistPolicy
{
    use HandlesAuthorization;

    // Users do not need a special role to be able to view playlists!
    public function viewAny(User $user)
    {
        return true;
    }

    // 1. Does the user have the right role / permissions?
    // 2. Is the model scoped to the user?
    public function view(User $user, Playlist $playlist)
    {
        return $user->id == $playlist->user_id;
    }
}
