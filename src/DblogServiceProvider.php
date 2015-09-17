<?php

namespace Supersixtwo\Dblog;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use App;

class DBlogServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        /* For Future Use
        
        // Publish package views
        $this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'dblog');
        
        */
        
        /* For Future use
	    
        // package routes
        $this->setupRoutes($this->app->router);
        
        */
        
        // publish migrations
        $this->publishes([
        	__DIR__.'/../database/migrations/' => database_path('/migrations')
		], 'migrations');
        
        /* For future use
	     
	    // publish configuration files   
        $this->publishes([
                __DIR__.'/config/config.php' => config_path('dblog.php'),
        ]);
        
        // use the vendor configuration file as fallback
        $this->mergeConfigFrom(
            __DIR__.'/config/config.php', 'dblog'
        );
        
        */
    }
    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'Supersixtwo\Dblog\Http\Controllers'], function($router)
        {
            require __DIR__.'/Http/routes.php';
        });
    }
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
      
      App::bind('DBlogClass', function()
        {
            return new Supersixtwo\Dblog\DBlogClass;
        });
        
    }

}