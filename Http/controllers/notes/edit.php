<?php

use Core\App;
use Core\Database;
use Core\Session;

$userID = Session::userID();
$errors = Session::get('errors', []);

$db = App::resolve(Database::class);

$note = $db -> query('SELECT * FROM notes WHERE id = :id', [
	'id' => $_GET['id'],
]) -> findOrFail();

authorize($note['user_id'] === $userID);

view("notes/edit.view.php", [
	'heading' => 'Edit Note',
	'errors' => $errors,
	'note' => $note,
]);