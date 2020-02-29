<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
	$account = new Account($con);
	


	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name){
		if(isset($_POST[$name])){
			echo $_POST[$name];
		}
	}

?>



<html>
<head>
	<title>Double B photography</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
</head>
<body>
	<div id="background">
		
			
		<div id="loginContainer">
					<div id="inputcontainer">
					<form id="loginForm" action="register.php" method="POST">
				 <h2>Login to your account</h2>


			 	<p>
			 		<?php echo $account->getError(constants::$loginFailed); ?>
					 <label for="loginusername">Username</label>
					<input id="loginusername" name="loginusername" type="text" placeholder="e.g shadiemarim"  required> 

			 	</p>


			 	<p>
			 		<label for="loginpassword">Password</label>
					<input id="loginpassword" name="loginpassword" type="password" placeholder="your password" required> 

				 </p>


					<button type="submit" name="loginButton">Log IN</button>

					<div class="hasAccountText">
						<span id="hideLogin">Dont't have an account? signup here</span>
					</div>

				</form>



				<form id="registerForm" action="register.php" method="POST">
				 <h2>Create your Account</h2>


			 	<p>
			 		<?php echo $account->getError(constants::$usernameCharacters); ?>
			 		<?php echo $account->getError(constants::$usernameTaken); ?>
			 		<label for="username">Username</label>
					<input id="username" name="loginusername" type="text" placeholder="e.g shadiemarim" value="<?php getInputValue('loginusername') ?>" required> 

			 	</p>


			 	<p>
			 		<?php echo $account->getError(constants::$firstnameCharacters); ?>
			 		<label for="firstname">First Name</label>
					<input id="firstname" name="firstname" type="text" placeholder="e.g Benja" value="<?php getInputValue('firstname') ?>"  required> 

			 	</p>



			 	<p>
			 		<?php echo $account->getError(constants::$lastnameCharacters); ?>
			 		<label for="lastname">Last Name</label>
					<input id="lastname" name="lastname" type="text" placeholder="e.g marim" value="<?php getInputValue('lastname') ?>"  required> 

				 </p>


				 <p>
				 	<?php echo $account->getError(constants::$emailsDoNotMatch); ?>
				 	<?php echo $account->getError(constants::$emailInvalid); ?>
				 	<?php echo $account->getError(constants::$emailTaken); ?>
					 <label for="email">Email</label>
					<input id="email" name="email" type="email" placeholder="e.g shadiemarim@gmail.com" value="<?php getInputValue('email') ?>" required> 

				 </p>



				 <p>
					 <label for="email">Confirm Email</label>
					<input id="email2" name="email2" type="email" placeholder="e.g shadiemarim@gmail.com" value="<?php getInputValue('email2') ?>" required> 

			 	</p>



				<p>
					<?php echo $account->getError(constants::$passwordsDoNotMatch); ?>
				 	<?php echo $account->getError(constants::$passwordNotAlphanumeric); ?>
				 	<?php echo $account->getError(constants::$passwordCharacters); ?>
					 <label for="password">Password</label>
					<input id="password" name="password" type="password" placeholder="your password" required> 

			 	</p>



				 <p>
					 <label for="password2">Confirm Password</label>
					<input id="password2" name="password2" type="password" placeholder="your password" required> 

				 </p>


					<button type="submit" name="registerButton">Sign Up</button>

					<div class="hasAccountText">8
						<span id="hideRegister">Already have an account? Log in here.</span>
					</div>

				</form>
		
			</div>
		</div>
	</div>
</body>

</html>