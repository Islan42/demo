<?php

use Http\Forms\LoginForm;
use Core\Authenticator;
use Core\Session;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form -> validate($email, $password) ){
	$auth = new Authenticator();
	
	if($auth -> atempt($email, $password)){
		redirect('/');
	} else {
		$form -> error('email', 'No matching account found for that email adress and password.');
	}
}

Session::flash('errors', $form -> errors());
Session::flash('old', [
	'email' => $email,
]);

redirect('/login');