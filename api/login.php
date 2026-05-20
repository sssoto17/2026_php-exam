<?php


// $email = $_GET["email"];
$email = $_POST["email"];

$user["email"] = $email;

session_start();

$_SESSION["user"] = $user;

header("Location: /feed");