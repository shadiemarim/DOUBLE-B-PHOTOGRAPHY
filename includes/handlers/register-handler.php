<?php 

function sanitizeFormpassword($inputText){
	$inputText= strip_tags($inputText);
	return $inputText;	
}


function sanitizeFormusername($inputText){
	$inputText= strip_tags($inputText);
	$inputText= str_replace(" ", "", $inputText);
	return $inputText;	
}

function santizeFormstring($inputText){
	$inputText= strip_tags($inputText);
	$inputText= str_replace(" ", "", $inputText);
	$inputText= ucfirst(strtolower($inputText));
	return $inputText;
}
 
if(isset($_POST{'registerButton'})){
	//register button was pressed
	$username= sanitizeFormusername($_POST['loginusername']);
	$firstname= santizeFormstring($_POST['firstname']);
	$lastname= santizeFormstring($_POST['lastname']);
	$email= santizeFormstring($_POST['email']);
	$email2= santizeFormstring($_POST['email2']);
	$password= sanitizeFormpassword($_POST['password']);
	$password2= sanitizeFormpassword($_POST['password2']);

	$wasSuccessful = $account->register($username, $firstname, $lastname, $email, $email2, $password, $password2);
	if($wasSuccessful == true){
		$_SESSION['userLoggedIn']=$username;
		header("Location: index.php");
	}



}

 ?>