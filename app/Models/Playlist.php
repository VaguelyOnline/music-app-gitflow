<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'image',
        'subtitle'
    ];

    public function scopeMatchSearch(Builder $builder, $search) {
        $builder
            ->where('name', 'like', "%$search%")
            ->orWhere('subtitle', 'like', "%$search%");
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function songs() {
        return $this->belongsToMany(Song::class);
    }
}
