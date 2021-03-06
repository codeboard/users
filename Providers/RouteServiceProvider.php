<?php  namespace Codeboard\Users\Providers;

use Illuminate\Routing\Router;
use Illuminate\Contracts\Routing\UrlGenerator;
use Codeboard\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @param  Router  $router
     * @param  UrlGenerator  $url
     * @return void
     */
    public function before(Router $router, UrlGenerator $url)
    {
        $url->setRootControllerNamespace('Codeboard\Users\Http\Controllers');
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        // Once the application has booted, we will include the default routes
        // file. This "namespace" helper will load the routes file within a
        // route group which automatically sets the controller namespace.
        $this->app->booted(function()
        {
            $this->namespaced('Codeboard\\Users\\Http\\Controllers', function(Router $router)
            {

                require __DIR__.'/../Http/routes.php';
            });
        });
    }

}