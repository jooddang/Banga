<?php
	// By default show the form to make the payment
	$showForm = true;
	
	// If the user hits the pay button, process the values
	if(isset($_POST['btnRegister']))
	{
		$user = new User();
		
		// Collect and store all the variables sent by the user
		$countryCode = $_POST['countryCode'];
		$phonenumber = $_POST['phonenumber'];
		
		$password = $_POST['password'];
		
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['zip'];
		
		$expMonth = $_POST['expmonth'];
		$expYear = $_POST['expyear'];
		$securityCode = $_POST['cvv'];
		
		// Check inputs
		if($controller->get("inputControl")->checkZipcode($zipcode)) {
			$user->set("zipcode", $zipcode);
		}
		
		
		
	}
?>

<div id="content">
	
	<?php 
		if($showForm) {
	?>
	
	<form action="index.php?p=depositCard" method="post">
		<!-- This is the main content, we need to use this for the logic -->
	
		<div class="boxRegister">
			<p>Register a new account.</p>
			+ <input class="inputSmall" type="text" name="countryCode" value="C. code" maxlength="4"/> - 
			<input class="inputLarge" type="text" name="phonenumber" value="Phonenumber" maxlength="13"/><br/>
			Password: <input type="password" name="password" class="inputLarge"/>
			<input class="inputLarge" type="text" name="firstName" value="First name"/><br/>
			<input class="inputLarge" type="text" name="lastName" value="Last name"/><br/>
			<input class="inputLarge" type="text" name="address" value="Address"/><br/>
			<input class="inputMedium" type="text" name="city" value="City"/>
			<input class="inputMedium" type="text" name="state" value="State" maxlength="16"/>
			<input class="inputSmall" type="text" name="zip" value="Zip" maxlength="5"/><br/>
			<input class="inputMedium" type="text" name="cardnumber" value="Card number" maxlength="16"/><br/>
			<br/><br/>
		</div>

		<input class="btn btnLarge" type="submit" name="btnRegister" value="Register"/>
	</form>
	
	<?php
		}
	?>
	
	<!-- End of content -->
	
</div>