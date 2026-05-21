<?php

use App\Controllers\GalleryController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use League\Route\Router;

return function (Router $router) {
    // PUBLIC
    $router->get("/", [HomeController::class, "index"]);
    $router->map(["GET", "POST"], "/login", [UserController::class, "login"]);
    $router->map(["GET", "POST"], "/signup", [UserController::class, "create"]);
    
    // AUTH
    $router->get("/feed", [UserController::class, "index"]);
    $router->get("/signout", [UserController::class, "logout"]);
    $router->get("/{username:word}", [UserController::class, "profile"]);
    
    $router->get("/{username:word}/gallery", [GalleryController::class, "index"]);
    $router->get("/{username:word}/gallery/{slug:word}", [GalleryController::class, "single"]);
    $router->map(["GET", "POST"], "/gallery/new", [GalleryController::class, "create"]);
    };