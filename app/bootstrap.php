<?php

define('BASE_URL', "http://localhost:8181/");

// remote api
define('NASA_APOD_API_URL', 'https://api.nasa.gov/planetary/apod?api_key=q6dddJbZqIYukQN9jISM7au7UhKATjoUWo3t5zUU&count=10');

// App paths
define('CONTROLLERS_DIR', __DIR__ . '/controllers');
define('MODELS_DIR', __DIR__ . '/models');
define('CLASSES_DIR', __DIR__ . '/classes');
define('VIEWS_DIR', __DIR__ . '/views');

// DB connection
define('MYSQL_DSN', "mysql:host=localhost;dbname=nasa");
define('MYSQL_USER', "root");
define('MYSQL_PASS', "");

// know how to load app classes
require_once __DIR__ . '/autoload.php';

$routes = [
    // display one media 
    'home' => 'MediaController@index',

    // save data from remote api
    'save' => 'MediaController@save',
];

require_once __DIR__ . '/router.php';
