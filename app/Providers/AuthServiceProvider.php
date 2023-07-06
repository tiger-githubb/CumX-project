<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //edit post policie
        Gate::define('edit-post', function (User $user, Post $post) {
            return $user->id === $post->user_id || $user->role === 1;
        });
    
        //update post policie
        Gate::define('update-post', function (User $user, Post $post) {
            return $user->id === $post->user_id || $user->role === 1;
        });
    
        //delete post policie
        Gate::define('delete-post', function (User $user, Post $post) {
            return $user->id === $post->user_id || $user->role === 1;
        });
    }
}
