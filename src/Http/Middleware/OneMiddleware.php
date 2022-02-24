<?php


namespace Packages\Mongo\Http\Middleware;
use Closure;

class OneMiddleware
{
    public function handle($request, Closure $next , $param)
    {
        echo "kljlfkdjslkdjflsjdf<br>";
        if ($param=="hello")
            echo "<br>gofte hello<br>";

        return $next($request);
    }
}
