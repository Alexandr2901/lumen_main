<?php

namespace App\Providers;

use App\Models\News;
use App\Models\User;
use App\Policies\NewsPolicy;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
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
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        Gate::policy(News::class, NewsPolicy::class);

        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            return Cache::get($request->bearerToken());
//            if ($request->bearerToken()) {
//                return User::where('remember_token', $request->bearerToken())->first();
//            }
        });
    }
}
