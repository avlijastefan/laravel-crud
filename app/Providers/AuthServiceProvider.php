<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            if ($user->isAdmin()) {
                return true;
            }
        });
       
        Gate::define('edit-settings', function ($user) {
            return $user->isAdmin
                        ? Response::allow()
                        : Response::deny('You must be a administrator.');
        });

        Gate::define('create-book', function ($user, $book) {
            return $user->isAdmin === $book->user_id
                        ? Response::allow()
                        : Response::deny('You must be a administrator.');
        });

        Gate::define('update-book', function ($user, $book) {
            return $user->isAdmin === $book->user_id
                        ? Response::allow()
                        : Response::deny('You must be a administrator.');
        });

        Gate::define('delete-book', function ($user, $book) {
            return $user->isAdmin === $book->user_id
                        ? Response::allow()
                        : Response::deny('You must be a administrator.');
        });

        Gate::define('showCreateForm-book', function ($user, $book) {
            return $user->isAdmin === $book->user_id
                        ? Response::allow()
                        : Response::deny('You must be a administrator.');
        });

        Gate::define('showEditForm-book', function ($user, $book) {
            return $user->isAdmin === $book->user_id
                        ? Response::allow()
                        : Response::deny('You must be a administrator.');
        });

        Gate::define('create-author', function ($user, $author) {
            return $user->isAdmin === $author->user_id
                        ? Response::allow()
                        : Response::deny('You must be a administrator.');
        });

        Gate::define('update-author', function ($user, $author) {
            return $user->isAdmin === $author->user_id
                        ? Response::allow()
                        : Response::deny('You must be a administrator.');
        });

        Gate::define('delete-author', function ($user, $author) {
            return $user->isAdmin === $author->user_id
                        ? Response::allow()
                        : Response::deny('You must be a administrator.');
        });

        Gate::define('showCreateForm-author', function ($user, $author) {
            return $user->isAdmin === $author->user_id
                        ? Response::allow()
                        : Response::deny('You must be a administrator.');
        });

        Gate::define('showEditForm-author', function ($user, $author) {
            return $user->isAdmin === $author->user_id
                        ? Response::allow()
                        : Response::deny('You must be a administrator.');
        });

        
    
        Gate::define('index-book', function ($user, $book) {
            return $user->id === $book->user_id;
        });
        
        Gate::define('show-book', function ($user, $book) {
            return $user->id === $book->user_id;
        });

        Gate::define('index-author', function ($user, $author) {
            return $user->id === $author->user_id;
        });
    }
}
