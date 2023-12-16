<?php

use Core\Session;

$errors = Session::get('errors', []);
$old = Session::get('old', []);

view("notes/create.view.php", [
	'heading' => 'Create a Note',
	'errors' => $errors,
	'old' => $old,
]);
