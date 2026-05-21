<?php

declare(strict_types=1);

// ##############################
function _validate_email(string $email = ""){
    $email = trim($email);

    if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Please provide a valid email address.", 400);
    }

    return $email;
}



// ##############################
define("username_min", 2);
define("username_max", 20);
function _validate_username(string $username = ""){
    $username = trim($username);

    if(strlen($username) < username_min){
        throw new Exception("Username must be at least ".username_min." characters.", 400);
    }

    if(strlen($username) > username_max){
        throw new Exception("Username can't exceed ".username_max." characters.", 400);
    }
    return $username;
}


// ##############################
define("name_min", 2);
define("name_max", 20);
function _validate_name(string $name = ""){
    $name = trim($name);

    if(strlen($name) < name_min){
        throw new Exception("First and last name must be at least ".name_min." characters.", 400);
    }

    if(strlen($name) > name_max){
        throw new Exception("First and last name can't exceed ".name_max." characters.", 400);
    }
    return $name;
}


// ##############################
define("password_min", 6);
define("password_max", 50);
function _validate_password(string $password = "", string $password_confirm = ""){
    $password = trim($password);
    
    if(strlen($password) < password_min){
        throw new Exception("Password must be at least ".password_min." characters.", 400);
    }
    
    if(strlen($password) > password_max){
        throw new Exception("Password can't exceed ".password_max." characters.", 400);
    }
    
    if ($password !== trim($password_confirm)) {
        throw new Exception("Please confirm your password.");
    }

    return $password;
}

// ##############################
function _no_cache(){
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: 0");
    header('Clear-Site-Data: "cache", "cookies", "storage", "executionContexts"');
}