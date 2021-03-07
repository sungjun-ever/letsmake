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
        return 'frees_index';
    }


}
