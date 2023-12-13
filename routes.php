<?php

$router -> get('/', '/index.php');
$router -> get('/about', '/about.php');
$router -> get('/contact', '/contact.php');

$router -> get('/notes', '/notes/index.php') -> only('auth');
$router -> get('/note', '/notes/show.php') -> only('auth');
$router -> delete('/note', '/notes/destroy.php') -> only('auth');

$router -> get('/note/edit', '/notes/edit.php');
$router -> patch('/note', '/notes/update.php');

$router -> get('/notes/create', '/notes/create.php');
$router -> post('/notes', '/notes/store.php');

$router -> get('/register', '/users/create.php') -> only('guest');
$router -> post('/register', '/users/store.php') -> only('guest');

$router -> get('/login', '/session/create.php') -> only('guest');
$router -> post('/login', '/session/store.php') -> only('guest');
$router -> delete('/session', '/session/destroy.php') -> only('auth');