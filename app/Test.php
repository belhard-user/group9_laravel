<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Test
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property bool $age
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $password
 * @property int $user_id
 * @property-read mixed $full_name
 * @method static \Illuminate\Database\Query\Builder|\App\Test whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Test whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Test whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Test whereAge($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Test whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Test whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Test wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Test whereUserId($value)
 * @mixin \Eloquent
 */
class Test extends Model
{
    protected $table = 'test';

    protected $fillable = ['username', 'user_id', 'email', 'age', 'password'];

    // get*Attribute
    public function getFullNameAttribute()
    {
        return $this->username . ' ' . $this->email;
    }

   /* public function setUsernameAttribute($val)
    {
        return $this->attributes['username'] = $val . '!!!';
    }*/
}
