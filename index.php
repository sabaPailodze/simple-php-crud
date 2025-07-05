<?php

require 'Response.php';
require 'fns.php';
require 'Database.php';
require 'router.php';


$config = require('config.php');
$db = new Database($config['database']);

?>
