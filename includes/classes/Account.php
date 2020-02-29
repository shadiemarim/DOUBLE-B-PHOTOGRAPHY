<?php
class Account{
	private $con;
	private $errorArray;

	public function __construct($con){
		$this->con = $con;
		$this->errorArray=array();
	}
	public function login($un, $pw){
		
		$pw=md5($pw);

		$query=mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password='$pw'");

		if(mysqli_num_rows($query)==1){
			return true;
		}
		else {
			array_push($this->errorArray, constants::$loginFailed);
			return false;
		}
	}

	public function register($loginusername, $firstname, $lastname, $email, $email2, $password, $password2){
		$this->validateusername($loginusername);
		$this->validatefirstname($firstname);
		$this->validatelastname($lastname);
		$this->validateemails($email, $email2);
		$this->validatepasswords($password, $password2);

		if(empty($this->errorArray) == true){
			//insert into database
			return $this->insertUserDetails($loginusername, $firstname, $lastname, $email, $password);
		}
		else{
			return false;
		}

	}
	private function insertUserDetails($loginusername, $firstname, $lastname, $email, $password){
		$encryptedpassword=md5($password);
		$profilePic="assets/images/profile-pics/shad.jpg";
		$date=date("Y-m-d");

		$result=mysqli_query($this->con, "INSERT INTO users VALUES ('', '$loginusername', '$firstname', '$lastname', '$email', '$encryptedpassword', '$date', '$profilePic')");
		return $result;
		
	}

	public function getError($error) {
		if(!in_array($error, $this->errorArray)){
			$error = "";
		}
		return "<span class='errorMessage'>$error</span>";
	}

	private function validateusername($loginusername){
		
		if(strlen($loginusername)>30 || strlen($loginusername) < 5){
			array_push($this->errorArray, constants::$usernameCharacters);
			return;
		} 

		$checkusernameQuery=mysqli_query($this->con, "SELECT username FROM users WHERE username= '$loginusername'");
		if(mysqli_num_rows($checkusernameQuery) !=0){
			array_push($this->errorArray, constants::$usernameTaken);
			return;
		}
	}

	private function validatefirstname($firstname){
		if(strlen($firstname)>20 || strlen($firstname) < 2){
			array_push($this->errorArray, constants::$firstnameCharacters);
			return;

		}
		
	}

	private function validatelastname($lastname){
		if(strlen($lastname)>20 || strlen($lastname) < 2){
			array_push($this->errorArray, constants::$lastnameCharacters);
			return;

		}
		
	}

	private function validateemails($email, $email2){
			if($email != $email2){
				array_push($this->errorArray, constants::$emailsDoNotMatch);
				return;
			}
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				array_push($this->errorArray, constants::$emailInvalid);
				return;
			}

			$checkEmailQuery=mysqli_query($this->con, "SELECT email FROM users WHERE email='$email'");
		if(mysqli_num_rows($checkEmailQuery) !=0){
			array_push($this->errorArray, constants::$emailTaken);
			return;
		}

	}

	private function validatepasswords($password, $password2){
		
		if($password != $password2){
			array_push($this->errorArray, constants::$passwordsDoNotMatch);
				return;
		}

		if(preg_match('/[^A-Za-z0-9]/', $password)){
			 array_push($this->errorArray, constants::$passwordNotAlphanumeric);
				return;
		}

		if(strlen($password)>30 || strlen($password) < 8){
			array_push($this->errorArray, constants::$passwordCharacters);
			return;

		}
	 }

}

?>