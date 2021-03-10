<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qna extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'story'];

    public function reply()
    {
        $this->hasOne('App\Models\Reply');
    }
}
