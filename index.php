<?php

require 'fns.php';
require 'Database.php';

$db = new Database();
$posts = $db -> query('select * from posts')->fetchAll(PDO::FETCH_ASSOC);

dd($posts);

?>
