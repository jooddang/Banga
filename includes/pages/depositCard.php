<?php
	// By default show the form to make the payment
	$showForm = true;
	
	// If the user hits the pay button, process the values
	if(isset($_POST['btnPay']))
	{
		$user = new User();
		
		// Collect and store all the variables sent by the user
		$cardnr = $_POST['selectCard'];
		$amountMoney = $_POST['amount'];
		
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['zip'];
		
		$expMonth = $_POST['expmonth'];
		$expYear = $_POST['expyear'];
		$securityCode = $_POST['cvv'];
		
		// Check inputs
		//if($controller->get("inputControl")->checkZipcode($zipcode))
			
		
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
	
		<div class="box">
			<p>Card ending with</p>
			<select class="selectCard" name="selectCard">
				<option value="7100">
					7100
				</option>
			</select>
			<br/><br/>
		</div>
	
		<div class="box">
			<p>Register a new card.</p>
		
			<input class="inputLarge" type="text" name="address" value="Address (billing)"/> <br/>
			<input class="inputMedium" type="text" name="city" value="City"/> <input class="inputSmall" type="text" name="state" value="State" maxlength="16"/> <input class="inputSmall" type="text" name="zip" value="Zip" maxlength="5"/> <br/>
			<input class="inputLarge" type="text" name="cardnumber" value="Card number" maxlength="16"/> <br/>
			<input class="inputSmall" type="text" name="expmonth" value="mm" maxlength="2"/> <input class="inputSmall" type="text" name="expyear" value="yy" maxlength="2"/> <input class="inputMedium" type="text" name="cvv" value="cvv" maxlength="4"/> 
			<br/><br/>
		</div>

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