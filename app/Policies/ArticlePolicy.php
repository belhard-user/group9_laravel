<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function test($user, $article)
    {
        return true;
    }

    public function articleUpdate($user, $article)
    {
        return $user->id == $article->user_id || $user->email == 'admin@gmail.com';
    }

    public function articleDelete($user)
    {
        return $user->email == 'admin@gmail.com';
    }
}
