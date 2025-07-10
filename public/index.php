<?php

// require 'Response.php';
// require 'fns.php';
// require 'Database.php';
// require 'router.php';


// $config = require('config.php');
// $db = new Database($config['database']);

const BASE_PATH = __DIR__.'/../';

require BASE_PATH.'Core/fns.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

require base_path('Core/router.php');

?>
