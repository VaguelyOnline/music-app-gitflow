<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPlaylistRequest;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class PlaylistController extends Controller
{

    public function __construct()
    {
        // Apply all the conventional 'CRUD' policy permissions, to their corresponding controller actions.
        // See: https://laravel.com/docs/9.x/authorization#authorizing-resource-controllers
        $this->authorizeResource(Playlist::class, 'playlist');
    }

    public function index(SearchPlaylistRequest $request) {

        $params = $request->validated();
        $search = Arr::get($params, 'search', '');

        $query = Auth::user()->playlists();
        if ($search != '') {
            $query->matchSearch($search);
        }
        $playlists = $query->paginate(8)->withQueryString();
        $promoted = $playlists->pop();


        return view('playlists.index', compact('playlists', 'promoted', 'search'));
    }

    // 
    public function show(Playlist $playlist) {
        return $playlist;
    }

}
