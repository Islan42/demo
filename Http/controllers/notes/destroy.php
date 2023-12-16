<?php

use Core\App;
use Core\Database;
use Core\Session;

$userID = Session::userID();
$id = $_POST['id'];

$db = App::resolve(Database::class);

$note = $db -> query('SELECT * FROM notes WHERE id = :id', ['id' => $id]) -> findOrFail();

authorize($note['user_id'] === $userID);

$db -> query('DELETE FROM notes WHERE id = :id', [
	'id' => $id,
]);

redirect('/notes');