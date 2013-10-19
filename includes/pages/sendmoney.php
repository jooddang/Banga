<div class="subSpace">
	<div class="subSpaceContent">
		Send Money
		
		<div id="btnAddContact" class="btn btnSmall">
			Add Contact
		</div>
		
		<div id="btnEditContacts" class="btn btnSmall">
			Edit Contacts
		</div>
	</div>
</div>

<?php
	if(isset($_GET["uid"])) {
		$uid = $_GET["uid"];
		$mUser = new user($uid);
		
		if(isset($_POST["btnPay"])) {
			$amount = $_POST["amount"];
			
			$currentAmount = $user->get("deposit");
			
			if($controller->get("inputControl")->isNumeric($amount)) {}
			
			$errorMessage = "";
			$errorMessage .= $controller->get("inputControl")->getError();
			
			if(strlen($errorMessage) > 1)
			{
				echo "1 or more errors occured:<br/>";
				echo $errorMessage;
			}
			else
			{
				if($currentAmount > $amount) {
					$user->sendMoney($amount);
					$mUser->deposit($amount);
				
					if($user->save() && $mUser->save()) {
						echo "Successfully sent $amount to ".$mUser->get('first_name').".";
						?><META HTTP-EQUIV="refresh" content="1;URL=index.php?p=home"><?php
					}
					else {
						echo "Error creating acccount.";
					}
				}
				else {
					echo "Insufficient funds.";
				}
				
			}
		}
	?>
		
		<form action="index.php?p=sendmoney&uid=<?php echo $uid; ?>" method="post">
			<div class="box">
				
				<p>
					Send money to <?php echo $mUser->get("first_name")." ".$mUser->get("last_name"); ?>.
				</p>
				
				<div class="currencyInput">$
					<input type="text" name="amount"/>
				</div>
				<br/>
				
				<input class="btn btnLarge" type="submit" name="btnPay" value="Pay"/>
				
			</div>
		</form>
		
	<?php
	}
	else {
?>


<div id="content">

	<!-- This is the main content, we need to use this for the logic -->
	<?php 
		$users = user::listUsers();
		
		for($i = 0; $i < count($users); $i++) {
			$cUser = $users[$i];
			
			if($cUser->get("uid") != $user->get("uid")) {
				?>
					<a class="contactPerson" href="index.php?p=sendmoney&uid=<?php echo $cUser->get("uid"); ?>">
						<div class="contactName">
							<?php
								echo $cUser->get("first_name")." ".$cUser->get("last_name");
							?>
						</div>
					</a>
				<?php
			}
		}
	?>
	
	<!-- End of content -->
	
</div>

<?php
	}
?>

<div class="subSpaceBottom">
	<div class="subSpaceContent">
		<div id="btnBack" class="btn btnSmall" onclick="location.reload();location.href='index.php?p=sendmoney'">
			Back
		</div>
	</div>
</div>