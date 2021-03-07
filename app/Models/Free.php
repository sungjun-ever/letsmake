<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Free extends Model
{
    use HasFactory;
    use Searchable;


    protected $fillable = ['title', 'story'];

    public function searchableAs()
    {
        return 'frees';
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'story' => $this->story,
            'created_at' => $this->created_at,
        ];
    }

}
