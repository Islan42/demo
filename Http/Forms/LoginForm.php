<?php

namespace Http\Forms;
use Core\Validator;

class LoginForm {
	protected $errors = [];
	
	public function errors(){
		return $this -> errors;
	}
	
	public function error($field, $message){
		$this -> errors[$field] = $message;
	}
	
	public function validate($email, $password){
		if (! Validator::email($email)){
			$this -> errors['email'] = 'You must provide a valid email.';
		}

		if (! Validator::string($password, 7, 255)){
			$this -> errors['password'] = 'You must provide a password with at least 7 chars.';
		}
		
		return empty($this -> errors);
	}
}