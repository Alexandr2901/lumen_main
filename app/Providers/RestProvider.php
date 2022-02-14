<?php

namespace App\Providers;

use App\Http\Requests\AbstractFormRequest;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Validation\ValidatesWhenResolved;

class RestProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/lang', 'kia-rest');

        $this->app->afterResolving(ValidatesWhenResolved::class, function ($resolved) {
            $resolved->validateResolved();
        });

        $this->app->resolving(AbstractFormRequest::class, function ($request, $app) {
            $request = AbstractFormRequest::createFrom($app['request'], $request);
            $request->setContainer($app);
        });
    }

    public function register()
    {
        parent::register();
    }

    public function provides()
    {
        return [];
    }
}
