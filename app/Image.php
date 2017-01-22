<?php

namespace App;

use App\Article;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name', 'path'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
