<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'story'];

    public function qna()
    {
        $this->belongsTo('App\Models\Qna');
    }
}
