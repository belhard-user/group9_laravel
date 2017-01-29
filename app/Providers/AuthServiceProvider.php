<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\Article::class => \App\Policies\ArticlePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*\Gate::define('article-update', function($user, $article){
            return $user->id == $article->user_id || $user->email == 'admin@gmail.com';
        });
        
        \Gate::define('article-delete', function($user){
            return $user->email == 'admin@gmail.com';
        });*/
    }
}
