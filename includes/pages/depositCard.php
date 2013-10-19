<?php
	// By default show the form to make the payment
	$showForm = true;
	
	$cardNumber = $user->get("card_number");
	
	// If the user hits the pay button, process the values
	if(isset($_POST['btnPay']))
	{
		$amountMoney = $_POST['amount'];
		
		if(strlen($cardNumber) == 0) {
			// Collect and store all the variables sent by the user
		
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip = $_POST['zip'];
			$country = $_POST['country'];
		
			$cardnumber = $_POST['cardnumber'];
			$expMonth = $_POST['expmonth'];
			$expYear = $_POST['expyear'];
			$securityCode = $_POST['cvv'];
		
			if($controller->get("inputControl")->checkInput($address, 6, "address", true)) {
				$user->set("address", $address);
			}
		
			if($controller->get("inputControl")->checkInput($city, 1, "city", true)) {
				$user->set("city", $city);
			}
		
			if($controller->get("inputControl")->checkInput($state, 2, "state", true)) {
				$user->set("state", $state);
			}
		
			if($controller->get("inputControl")->checkInput($zip, 5, "zip code", true)) {
				$user->set("zipcode", $zip);
			}
			
			if($controller->get("inputControl")->checkInput($country, 2, "country", true)) {
				$user->set("country", $country);
			}
			
			if($controller->get("inputControl")->checkInput($cardnumber, 16, "card number", true)) {
				$user->set("card_number", $cardnumber);
			}
		
			if($controller->get("inputControl")->checkInput($expMonth, 2, "expiration month", true) &&
				$controller->get("inputControl")->checkInput($expYear, 2, "expiration year", true)) 
			{
				$expiration = $expMonth."/".$expYear;
				$user->set("card_expiration", $expiration);
			}
		
			if($controller->get("inputControl")->checkInput($securityCode, 3, "cvv", true)) {
				$user->set("card_secret", $securityCode);
			}
		}
		
		$errorMessage = "";
		$errorMessage .= $controller->get("inputControl")->getError();
		
		if(strlen($errorMessage) == 0)
		{
			if($controller->get("inputControl")->checkInput($amountMoney, 1, "money amount", true)) {
				$user->deposit($amountMoney);
			}
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
				echo "Successfully deposited $amountMoney.";
				?><META HTTP-EQUIV="refresh" content="1;URL=index.php?p=home"><?php
			}
			else {
				echo "Error depositing money.";
			}
		}
	}
?>

<div class="subSpace">
	<div class="subSpaceContent">
		Deposit Money
	</div>
</div>

<div id="content">
	
	<?php 
		if($showForm) {
	?>
	
	<form action="index.php?p=depositCard" method="post">
		<!-- This is the main content, we need to use this for the logic -->
		<div class="box">
			<p>Deposit money</p>
			<div class="currencyInput">$
				<input type="text" name="amount"/>
			</div>
			<br/>
		</div>
		
		<?php
			if(strlen($cardNumber) > 10) {
		?>
		
		<div class="box">
			<p>Card ending with</p>
			<?php 
				$cardNumber = substr($cardNumber, -4);
				echo $cardNumber;
			?>
			<br/><br/>
		</div>
		
		<?php
			}
			else {
		?>
		
		<div class="box">
			<p>Register a new card.</p>
		
			<input class="inputLarge" type="text" name="address" placeholder="Address (billing)"/> <br/>
			<input class="inputMedium" type="text" name="city" placeholder="City"/> <input class="inputSmall" type="text" name="state" placeholder="State" maxlength="16"/> <input class="inputSmall" type="text" name="zip" placeholder="Zip" maxlength="5"/> <br/>
			<input class="inputLarge" type="text" name="country" placeholder="Country"/> <br/>
			<input class="inputLarge" type="text" name="cardnumber" placeholder="Card number" maxlength="16"/> <br/>
			<input class="inputSmall" type="text" name="expmonth" placeholder="mm" maxlength="2"/> <input class="inputSmall" type="text" name="expyear" placeholder="yy" maxlength="2"/> <input class="inputMedium" type="text" name="cvv" placeholder="cvv" maxlength="4"/> 
			<br/><br/>
		</div>
		
		<?php
			}
		?>

		<input class="btn btnLarge" type="submit" name="btnPay" value="Pay"/>
	</form>
	
	<?php
		}
	?>
	
	<!-- End of content -->
	
</div>

<div class="subSpaceBottom">
	<div class="subSpaceContent">
		<div id="btnBack" class="btn btnSmall" onclick="location.reload();location.href='index.php?p=deposit'">
			Back
		</div>
	</div>
</div>