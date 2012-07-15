<?php

class User extends AppModel {
	public $name = 'User';
	
	/**
	 * User validation
	 */
	public $validate = array(
		'username'=>array(
			'Not empty'=>array(
				'rule'=>'notEmpty',
				'message'=>'Please enter your username'
			),
			'Between'=>array(
				'rule'=>array('between', 2, 20),
				'message'=>'Username must be between 2 and 20 characters in length'
			),
			'Unique'=>array(
				'rule'=>'isUnique',
				'message'=>'That username is already taken'
			)
		),
		'password'=>array(
			'Not empty'=>array(
				'rule'=>'notEmpty',
				'message'=>'Please enter your password'
			),
			'Between'=>array(
				'rule'=>array('between', 6, 20),
				'message'=>'Password must be between 6 and 20 characters in length'
			),
			'Matches Password'=>array(
				'rule'=>'matchPassword',
				'message'=>'Your passwords do not match'
			)
		),
		'firstname'=>array(
			'Not empty'=>array(
				'rule'=>'notEmpty',
				'message'=>'Please enter your firstname'
			),
			'Min Length'=>array(
				'rule'=>array('minLength', 2),
				'message'=>'First name must be at least 2 characters in length'
			)
		),
		'lastname'=>array(
			'Not empty'=>array(
				'rule'=>'notEmpty',
				'message'=>'Please enter your lastname'
			),
			'Min Length'=>array(
				'rule'=>array('minLength', 2),
				'message'=>'Last name must be at least 2 characters in length'
			)
		),
		'email'=>array(
			'Not empty'=>array(
				'rule'=>'notEmpty',
				'message'=>'Please enter your email address'
			),
			'Email'=>array(
				'rule'=>'email',
				'message'=>'Please enter a valid email address'
			),
			'Unique'=>array(
				'rule'=>'isUnique',
				'message'=>'That email address is already taken'
			)
		),
		'skills'=>array(
			'Not empty'=>array(
				'rule'=>'notEmpty',
				'message'=>'Please enter your skill set'
			),
			'Min Length'=>array(
				'rule'=>array('minLength', 10),
				'message'=>'Your skillset must be at least 10 characters in length'
			)
		),
		'country'=>array(
			'Not empty'=>array(
				'rule'=>'notEmpty',
				'message'=>'Please enter the country you are from'
			),
			'Min Length'=>array(
				'rule'=>array('minLength', 2),
				'message'=>'Your country must be at least 10 characters in length'
			)
		),
		'experience'=>array(
			'Not empty'=>array(
				'rule'=>'notEmpty',
				'message'=>'Please enter your years of experience'
			),
			'numeric'=>array(
				'rule'=>'numeric',
				'message'=>'Your years of experience can only be a whole number'
			)
		)
	);
	
	/**
	 * Match the password with the confirmation password.
	 * Invalidate the password confirmation field if they do not match
	 * 
	 */
	public function matchPassword($data) {
		if ($data['password'] == $this->data['User']['password_confirmation']) {
			return true;
		}
		$this->invalidate('password_confirmation', 'Your Passwords do not match');
		return false;
	}
	
	/**
	 * Has the users password
	 * 
	 */
	public function hashNewUserPassword() {
		if (isset($this->data['User']['password'])) {
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		}
	}
	
	/**
	 * Runs before every new user save
	 */
	public function beforeSave() {
		$this->hashNewUserPassword();
		return true;
	}
}
