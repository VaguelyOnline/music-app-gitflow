<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image'
    ];

    /**
     * Relationship method. Each Artist is associated with a collection of Songs.
     */
    public function songs() {
        return $this->belongsToMany(Song::class);
    }

}
