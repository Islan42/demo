<?php

use Core\App;
use Core\Database;
use Core\Session;

$userID = Session::userID();

$db = App::resolve(Database::class);

$notes = $db -> query('SELECT * FROM notes WHERE user_id = :userid', [
	'userid' => $userID,
]) -> findAll();

view("notes/index.view.php", [
	'heading' => 'My Notes',
	'notes' => $notes,
]);
