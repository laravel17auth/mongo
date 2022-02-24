<?php


namespace Packages\Mongo\Facde;


use Illuminate\Support\Facades\Facade;
use phpDocumentor\Reflection\Types\Static_;


class MongoaFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return "mongoa";
    }
}
