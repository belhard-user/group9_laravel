<?php

namespace App;

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
            $this->attributes['slug'] = $this->translit($value);
        }
        $this->attributes['title'] = $value;
    }

    public function scopePopulate($query)
    {
        return $query
            ->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc');
    }

    private function translit($str) {
        $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', ' ', ',');
        $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya', '-','');

        return strtolower(str_replace($rus, $lat, $str));
    }
}
