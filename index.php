<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('profile', 'DefaultController');
Routing::get('friends', 'DefaultController');
Routing::get('exercises', 'DefaultController');

Routing::run($path);