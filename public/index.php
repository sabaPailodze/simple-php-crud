<?php

// require 'Response.php';
// require 'fns.php';
// require 'Database.php';
// require 'router.php';


// $config = require('config.php');
// $db = new Database($config['database']);

const BASE_PATH = __DIR__.'/../';

require BASE_PATH.'fns.php';

spl_autoload_register(function ($class) {
    require base_path("Core/" . $class . '.php');
});

require base_path('router.php');

?>
