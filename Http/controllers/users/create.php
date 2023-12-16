<?php

use Core\Session;

$errors = Session::get('errors', []);

view('users/create.view.php', [
	'errors' => $errors,
]);