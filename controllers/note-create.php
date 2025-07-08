<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Create Note';


if($_SERVER['REQUEST_METHOD']==='POST'){   
    
    $errors = [];
    $congrats = [];

    if(strlen($_POST['body']) === 0){
        $errors['body'] = 'A body is required';
    }

    if(strlen($_POST['body']) > 10){
        $errors['body'] = 'the body can not be more than 10 chars';
    }

    if(empty($errors)){
        $db->query("INSERT INTO notes(body , user_id) VALUES(:body, :user_id)", [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);

        $congrats['body'] = 'Congrats your note sent succesfully';
    }

}

require 'views/note-create.view.php';

?>