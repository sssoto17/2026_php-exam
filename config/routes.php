<?php

use App\Controllers\GalleryController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use League\Route\Router;

return function (Router $router) {
    $router->get("/", [HomeController::class, "index"]);
    
    // $router->get("/feed", [UserController::class, "index"]);
    $router->get("/profile/{username:word}", [UserController::class, "profile"]);
    $router->get("/login", [UserController::class, "login"]);
    $router->map(["GET", "POST"], "/signup", [UserController::class, "create"]);
    
    $router->get("/gallery", [GalleryController::class, "index"]);
    $router->get("/gallery/{slug:word}", [GalleryController::class, "single"]);
    };