<?php
	class User
	{
		public $email;
		public $password;
		
		function __contruct($lgEmail, $lgPassword)
    	{
			$this->$email = $lgEmail;
			$this->$password = $lgPassword;
		}
	}
	
	class UserInformation
	{
		public $fname;
		public $lname;
		public $mname;
		public $phone1;
		public $phone2;
		public $phone3;
		public $address1;
		public $address2;
		public $address3;
		public $city;
		public $country;		
		
		function __contruct($lgEmail, $lgPassword)
    	{
				
		}
	}

?>