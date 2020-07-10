<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('alphanum_spaces', function ($attribute, $value) {

            // This will only accept alpha and spaces. 
            // If you want to accept hyphens use: /^[\pL\s-]+$/u.
            return preg_match('/^[\pL\s]+$/u', $value); 
        });

        Validator::extend('uniqueFirstAndLastName', function ($attribute, $value, $parameters, $validator) {
             $count = DB::table('authors')->where('first_name', $value)
                                            ->where('last_name', $parameters[0])
                                            ->count();
            
                return $count === 0;
            });
    }
}
