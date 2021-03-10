<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Photo extends Model
{
    use HasFactory;
    use Searchable;
    protected $fillable = ['title', 'story', 'imageUrl', 'imageName'];

    public function searchableAs()
    {
        return 'photos';
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'story' => $this->story,
        ];
    }
}
