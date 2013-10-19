<div class="subSpace">
	<div class="subSpaceContent">
		Deposit Money
	</div>
</div>

<div id="content">
	<?php
	
	// If the user hits the pay button, process the values
	if(isset($_POST['btnRedeem']))
	{
		$code = $_POST['moneyCode'];
		
		if($controller->get("inputControl")->checkInput($code, 12, "code", true)) {
			$user->deposit(10);
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
				echo "Successfully deposited 10 ".$user->get("currency").".";
				?><META HTTP-EQUIV="refresh" content="1;URL=index.php?p=home"><?php
			}
			else {
				echo "Error depositing money.";
			}
		}
	}
	
	?>
	<!-- This is the main content, we need to use this for the logic -->
	<form action="index.php?p=depositCode" method="post">
		<div class="box">
			<p>
				Enter code
			</p>
			<div class="currencyInput">
				<input type="text" name="moneyCode" class="inputLarge"/>
			</div>
			<p></p>
		</div>
		
		<input class="btn btnLarge" type="submit" name="btnRedeem" value="Redeem code"/>
	</form>
	
	<!-- End of content -->
	
</div>

<div class="subSpaceBottom">
	<div class="subSpaceContent">
		<div id="btnBack" class="btn btnSmall" onclick="location.reload();location.href='index.php?p=deposit'">
			Back
		</div>
	</div>
</div>