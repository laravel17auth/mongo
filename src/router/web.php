<?php
use \Illuminate\Support\Facades\Route;

Route::get("/m1",function (){
    echo "salam m1";
});


Route::get("/m2",[\Packages\Mongo\Http\Controllers\OneController::class,"one"])
->middleware("one:hello");
