<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Session;

$userID = Session::userID();
$body = $_POST['body'];

$errors = [];
$db = App::resolve(Database::class);
	
if (! Validator::string($body, 1, 1000)){
	$errors['body'] = 'A body of no more than 1000 characters is required.';
}

if (! empty($errors)){
	// return view("notes/create.view.php", [
		// 'heading' => 'Create a Note',
		// 'errors' => $errors,
	// ]);	
	Session::flash('errors', $errors);
	Session::flash('old', ['body' => $body]);
	redirect('/notes/create');
}

$db -> query('INSERT INTO `app_db`.`notes` (body, user_id) VALUES (:body, :user_id);', [
	'body' => $_POST['body'],
	'user_id' => $userID,
]);	

header('location: /notes');
die();

