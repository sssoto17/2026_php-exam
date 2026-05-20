<?php

require_once __DIR__."/_.php";

if(  ! isset($_SESSION["user"]) ){
    header("Location: /login");
}