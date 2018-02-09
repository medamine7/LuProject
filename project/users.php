<?php

	public class users()
	{
		public $user_id;           
		public $first_name;          
		public $last_name;            
		public $email;                
		public $username;             
		public $password; 
		public $gender;                    
		public $birthdate;                
		public $description;                
		public $user_photo;          
		public $status;                 
		public $created_at; 

		public __construct($last_name, $first_name, $email, $birthdate, $gender, $username, $password){

			//$this->user_id=$user_id;
			$this->$first_name=$first_name;          
			$this->$last_name=$last_name;            
			$this->$email=$email;                
			$this->$username=$email;             
			$this->$birthdate=$birthdate;                
			$this->$password$=$password;                     
			$this->$gender$=$gender;                     
			//$this->$description=$description;                
			//$this->$user_photo=$user_photo;          
			//$this->$status=$status;                 
			//$this->$created_at=$created_at; 


		}


	}


	




?>

