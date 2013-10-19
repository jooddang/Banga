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
		$password2 = $_POST['password2'];
		
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['zip'];
		$country = $_POST['country'];
		
		$expMonth = $_POST['expMonth'];
		$expYear = $_POST['expYear'];
		$securityCode = $_POST['securityCode'];
		
		// Check inputs
		if($controller->get("inputControl")->checkInput($countryCode, 1, "country code", true) &&
			$controller->get("inputControl")->checkInput($phonenumber, 10, "phonenumber", true))
		{
			$cell_number = "+".$countryCode."-".$phonenumber;
			$user->set("cell_number", $cell_number);
		}
		
		if($controller->get("inputControl")->checkInput($password, 6, "password", true) &&
			$controller->get("inputControl")->areEqual($password, $password2)) 
		{
			$pass = md5($password);
			$user->set("password", $pass);
		}
		
		if($controller->get("inputControl")->checkInput($firstName, 2, "first name", false)) {
			$user->set("first_name", $firstName);
		}
		
		if($controller->get("inputControl")->checkInput($lastName, 2, "last name", false)) {
			$user->set("last_name", $lastName);
		}
		
		if($controller->get("inputControl")->checkInput($address, 6, "address", false)) {
			$user->set("address", $address);
		}
		
		if($controller->get("inputControl")->checkInput($city, 1, "city", false)) {
			$user->set("city", $city);
		}
		
		if($controller->get("inputControl")->checkInput($state, 2, "state", false)) {
			$user->set("state", $state);
		}
		
		if($controller->get("inputControl")->checkInput($zip, 5, "zip code", false)) {
			$user->set("zipcode", $zip);
		}
		
		if($controller->get("inputControl")->checkInput($country, 2, "country", true)) {
			$user->set("country", $country);
		}
		
		if($controller->get("inputControl")->checkInput($expMonth, 2, "expiration month", false) &&
			$controller->get("inputControl")->checkInput($expYear, 2, "expiration year", false)) 
		{
			$expiration = $expMonth."/".$expYear;
			$user->set("card_expiration", $expiration);
		}
		
		if($controller->get("inputControl")->checkInput($securityCode, 3, "cvv", false)) {
			$user->set("card_secret", $securityCode);
		}
		
		$errorMessage = "";
		$errorMessage .= $controller->get("inputControl")->getError();
		
		if(strlen($errorMessage) > 1)
		{
			echo "1 or more errors occured:<br/>";
			echo $errorMessage;
		}
		else
		{
			if($user->save()) {
				echo "Successfully registered.";
				?><META HTTP-EQUIV="refresh" content="1;URL=index.php?p=home"><?php
			}
			else {
				echo "Error creating acccount.";
			}
		}
	}
?>

<div id="content">
	
	<?php 
		if($showForm) {
	?>
	
	<form action="index.php?p=register" method="post">
		<!-- This is the main content, we need to use this for the logic -->
	
		<div class="boxRegister">
			<p>Register a new account.</p>
			+ <input class="inputSmall" type="text" name="countryCode" placeholder="C. code" maxlength="4"/> - 
			<input class="inputMedium" type="text" name="phonenumber" placeholder="Phonenumber" maxlength="13"/> <span class="red">*</span><br/>
			Password: <input type="password" name="password" class="inputLarge"/> <span class="red">*</span><br/>
			Re type: <input type="password" name="password2" class="inputLarge"/> <span class="red">*</span><br/>
			<input class="inputLarge" type="text" name="firstName" placeholder="First name"/> <span class="red">*</span><br/>
			<input class="inputLarge" type="text" name="lastName" placeholder="Last name"/> <span class="red">*</span><br/>
			<input class="inputLarge" type="text" name="address" placeholder="Address"/><br/>
			<input class="inputMedium" type="text" name="city" placeholder="City"/>
			<input class="inputMedium" type="text" name="state" placeholder="State" maxlength="16"/>
			<input class="inputSmall" type="text" name="zip" placeholder="Zip" maxlength="5"/><br/>
			<input class="inputMedium" type="text" name="country" placeholder="Country"/><br/>
			<input class="inputMedium" type="text" name="cardnumber" placeholder="Card number" maxlength="16"/><br/>
			<input class="inputSmall" type="text" name="expMonth" placeholder="mm" maxlength="2"/>
			<input class="inputSmall" type="text" name="expYear" placeholder="yy" maxlength="2"/>
			<input class="inputSmall" type="text" name="securityCode" placeholder="cvv" maxlength="4"/>
			<br/><br/>
			
			<p class="txtSmall">
				Fields with a * are required.
			</p>
			
			<input class="btn btnLarge" type="submit" name="btnRegister" value="Register"/>
		</div>
	</form>
	
	<?php
		}
	?>
	
	<!-- End of content -->
	
</div>