<?php

use Core\Validator;
use Core\App;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::string($password, 7, 255)){
	$errors['password'] = 'You must insert a password with more than 7 chars.';
}

if (! Validator::email($email)){
	$errors['email'] = 'You must provide a valid email.';
}

if (! empty($errors)){
	return view('users/create.view.php', [
		'errors' => $errors,
	]);
}

$db = App::resolve(Database::class);

$user= $db -> query('SELECT * FROM users WHERE email = :email', [
	'email' => $email,
]) -> find();

if ($user){
	header('location: /');
	die();
} else {
	$db -> query('INSERT INTO users (email, password) VALUES (:email, :password)', [
		'email' => $email,
		'password' => password_hash($password, PASSWORD_BCRYPT),
	]);
	
	$_SESSION['user'] = [
		'email' => $email,
	];
	login([
		'email' => $email,
	]);
	
	header('location: /notes');
	die();	
}