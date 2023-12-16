<?php

namespace Http\Forms;
use Core\Validator;
use Core\ValidationException;

class RegisterForm {
	protected $errors = [];
	protected $attributes = [];
	
	public function errors(){
		return $this -> errors;
	}
	
	public function attributes(){
		return $this -> attributes;
	}
	
	public function error($field, $message){
		$this -> errors[$field] = $message;
		
		return $this;
	}
	
	public function __construct($attributes){
		$this -> attributes = $attributes;
		
		if (! Validator::email($attributes['email'])){
			$this -> errors['email'] = 'You must provide a valid email.';
		}

		if (! Validator::string($attributes['password'], 7, 255)){
			$this -> errors['password'] = 'You must provide a password with at least 7 chars.';
		}
	}
	
	public static function validate($attributes){
		$instance = new static($attributes);
		
		return $instance -> failed() ? $instance -> throw() : $instance;
	}
	
	public function failed(){
		return count($this -> errors);
	}
	
	public function throw(){
		ValidationException::throw($this -> errors, $this -> attributes);
	}
}