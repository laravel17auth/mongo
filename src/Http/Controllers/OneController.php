<?php


namespace Packages\Mongo\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OneController extends Controller
{
    public function one(Request $request)
    {
//        var_dump($request);
//        return view("mongo::one");
        return view("mongo.one");
    }
}
