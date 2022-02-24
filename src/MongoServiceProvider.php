<?php


namespace Packages\Mongo;


use Closure;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Packages\Mongo\Http\Middleware\OneMiddleware;
use Packages\Mongo\Repository\Mongoa;
use romanzipp\Seo\Providers\SeoServiceProvider;
use Xaamin\JWT\Providers\Laravel\JWTServiceProvider;

class MongoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(JWTServiceProvider::class);
        $this->app->register(SeoServiceProvider::class);
        $facadeLoader=\Illuminate\Foundation\AliasLoader::getInstance();
        $facadeLoader->alias("Jwt",\Xaamin\JWT\Facades\Laravel\JWT::class);


        $this->app->bind("mongoa",function (){
            return new Mongoa();
        });

        $this->mergeConfigFrom(__DIR__."/Configs/enc.php","enc");
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__."/router/web.php");
//        require __DIR__."/router/web.php";

        $this->loadViewsFrom(__DIR__."/views","mongo");

//        $this->app['router']->middleware("one",OneMiddleware::class);
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('one',OneMiddleware::class);

        $this->publishes([
            __DIR__."/database/Migrations" => database_path("/migrations")
        ],"migrates");

        $this->publishes([
            __DIR__."/Configs/enc.php" => config_path("enc.php"),
            __DIR__."/Configs/IO.php" => config_path("io.php")
        ],"config");

        $this->publishes([
            __DIR__."/views" => resource_path("views/mongo/")
        ],"view");
    }
}
