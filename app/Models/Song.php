<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image'
    ];

    /**
     * Relationship method. Each Song is associated with a collection of Artists.
     */
    public function artists() {
        return $this->belongsToMany(Artist::class);
    }

    public function playlists() {
        return $this->belongsToMany(Playlist::class);
    }
}
