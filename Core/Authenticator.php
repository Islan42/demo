<?php

namespace Core;
use Core\App;
use Core\Database;
use Core\Session;

class Authenticator {
	public function atempt($email, $password){
		$user = App::resolve(Database::class) -> query('SELECT * FROM users WHERE email = :email', [
			'email' => $email,
		]) -> find();

		if ($user){
			if (password_verify($password, $user['password'])){
				$this -> login([
					'email' => $email,
				]);
				
				return true;
			}
		}
		
		return false;
	}
	
	public function oldUser($email){
		$user = App::resolve(Database::class) -> query('SELECT * FROM users WHERE email = :email', [
			'email' => $email,
		]) -> find();
		
		return (bool) $user;
	}
	
	public function login($user){
		Session::put('user', [
			'email' => $user['email'],
		]);
		
		session_regenerate_id();
	}

	public function logout(){
		Session::destroy();
	}
}