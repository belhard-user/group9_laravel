<?php

namespace App;

use App\Image;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Article
 *
 * @property int $id
 * @property string $title
 * @property string $short_description
 * @property string $body
 * @property string $slug
 * @property int $user_id
 * @property Carbon $published_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereShortDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article wherePublishedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Article extends Model
{
    protected $fillable = ['title', 'published_at', 'short_description', 'body'];
    protected $dates = ['published_at'];

    public function setTitleAttribute($value)
    {
        if(empty($this->attributes['slug'])) {
            $this->attributes['slug'] = str_slug($value);
        }
        $this->attributes['title'] = $value;
    }

    public function scopePopulate($query)
    {
        return $query
            ->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc');
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function getTagsAttribute()
    {
        return $this->tag()->pluck('id')->toArray();
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
