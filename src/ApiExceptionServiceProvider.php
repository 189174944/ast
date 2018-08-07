<?php

namespace Ast;

use Illuminate\Support\ServiceProvider;

class ApiExceptionServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/apiexception.php' => config_path('apiexception.php')
        ]);
    }
    public function register()
    {
    }
}