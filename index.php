<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('signup', 'DefaultController');

Routing::post('login', 'SecurityController');
Routing::post('logout', "SecurityController");
Routing::post('register', 'SecurityController');

Routing::get('profile', 'ProfileController');
Routing::get('profile_settings', 'ProfileController');
Routing::post('profileSettings', 'ProfileController');

Routing::get('exercises', 'ExercisesController');
Routing::get('exercise', 'ExercisesController');
Routing::get('add_exercise', 'ExercisesController');
Routing::get('settings', 'ExercisesController');
Routing::post('add_ex', 'ExercisesController');
Routing::post('accept_ex', 'ExercisesController');
Routing::post('reject_ex', 'ExercisesController');
Routing::post('schedule_ex', 'ExercisesController');

//Routing::get('friends', 'DefaultController');

Routing::run($path);