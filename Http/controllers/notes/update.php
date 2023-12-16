<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Session;

$userID = Session::userID();
$noteID = $_POST['id'];

$db = App::resolve(Database::class);

$errors = [];

$note = $db -> query('SELECT * FROM notes WHERE id = :id', [
	'id' => $noteID,
]) -> findOrFail();

authorize($note['user_id'] === $userID);

if (! Validator::string($_POST['body'], 1, 1000)){
	$errors['body'] = 'A body of no more than 1000 characters is required.';
}

if (! empty($errors)){
	Session::flash('errors', $errors);
	redirect("/note/edit?id={$note['id']}");
}

$db -> query('UPDATE notes SET body = :body WHERE id = :id', [
	'body' => $_POST['body'],
	'id' => $_POST['id'],
]);

redirect('/notes');