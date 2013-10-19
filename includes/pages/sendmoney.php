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
		
		if(isset($_POST["btnPay"]) || isset($_GET["btnPay"])) {
			if (isset($_GET["btnPay"])) {
				$amount = $_GET["amount"];
			} else {
				$amount = $_POST["amount"];
			}
			
			$currentAmount = $user->get("deposit");
			
			if($currentAmount >= $amount) {
				$user->sendMoney($amount);
				$mUser->deposit($amount);
				
				$transaction  = new transaction();
				$transaction->set("uid_from", $user->get("uid"));
				$transaction->set("uid_to", $mUser->get("uid"));
				$transaction->set("amount", $amount);
				$today = date("m/d/y");
				$transaction->set("send_date", $today);
				
				if($user->save() && $mUser->save()) {
					echo "Successfully sent $amount to ".$mUser->get('first_name').".";
					$transaction->save();
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
		<div id="btnBack" class="btn btnSmall" onclick="location.reload();location.href='index.php?p=home'">
			Back
		</div>
	</div>
</div>