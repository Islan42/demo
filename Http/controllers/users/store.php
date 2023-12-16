<?php

use Core\Validator;
use Core\App;
use Core\Database;

use Http\Forms\RegisterForm;
use Core\Authenticator;
use Core\Session;

$email = $_POST['email'];
$password = $_POST['password'];

$form = RegisterForm::validate([
	'email' => $email,
	'password' => $password,
]);

$auth = new Authenticator;

$old = $auth -> oldUser($email);

if ($old){
	Session::flash('old', [
		'email' => $form -> attributes()['email'],
	]);
	Session::flash('errors', [
		'password' => 'You already have an account, sou you was REDIRECTED TO LOGIN PAGE.'
	]);
	redirect('/login');
} else {
	$db = App::resolve('Core\Database');
	
	$db -> query('INSERT INTO users (email, password) VALUES (:email, :password)', [
		'email' => $email,
		'password' => password_hash($password, PASSWORD_BCRYPT),
	]);
	
	$auth -> atempt($email, $password);
	
	redirect('/');
}