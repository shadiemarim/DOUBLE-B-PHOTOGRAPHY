<?php
if(isset($_POST{'loginButton'})){
	//login button was pressed


	$username=$_POST['loginusername'];
	$password=$_POST['loginpassword'];

	$result=$account->login($username, $password);

	if($result==true){
		$_SESSION['userLoggedIn']=$username;
		header("location: index.php");
	}

}
?>