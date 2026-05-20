<?php
require_once __DIR__.'/router.php';

// PUBLIC
get('/', 'pages/index.php');
get('/login', 'pages/login.php');

// AUTH
get('/feed', 'pages/feed.php');

// API
post('/api/login', 'api/login.php');

// DYNAMIC ROUTES REFERENCE
// get('/items/$category', 'pages/items.php');
// get('/items/$category/size/$size', 'pages/items.php');
// get("/property", "api/api-get-item.php");
// get("/property-delete", "api/api-delete-item.php");