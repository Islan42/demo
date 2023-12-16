<?php

use Http\Forms\LoginForm;
use Core\Authenticator;


$email = $_POST['email'];
$password = $_POST['password'];

$form = LoginForm::validate([
	'email' => $email,
	'password' => $password,
]);

$signedIn = (new Authenticator) -> atempt($email, $password);

if (! $signedIn){
	$form -> error(
		'email', 'No matching account found for that email adress and password.'
	) -> throw();
}

redirect('/');