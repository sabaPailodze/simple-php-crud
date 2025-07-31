<?php

use Core\App;
use Core\Validator;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email adrress';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least 7 characters';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    // თუ უკვე არსებობს - შევიდეს სისტემაში
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    header('location: /');
    exit();
} else {
    // რეგისტრაცია
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' =>  password_hash($password, PASSWORD_DEFAULT) // არასდროს შეინახო მონაცემთა ბაზის პაროლები clear text - ით! ყოველთვის გამოვიყენოთ hash
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
    exit();
}
