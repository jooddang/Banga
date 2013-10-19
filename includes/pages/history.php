<div class="subSpace">
	<div class="subSpaceContent">
		History
	</div>
</div>

<div id="content">

	<!-- This is the main content, we need to use this for the logic -->
	
	<?php
		$transactionsList = transaction::listTransactions($user->get("uid"));
		
		if(count($transactionsList) > 0) {
			for($i = 0; $i < count($transactionsList); $i++) {
				$transaction = $transactionsList[$i];
				$amount = $transaction->get("amount");
				$toID = $transaction->get("uid_to");
				$fromID = $transaction->get("uid_from");
				$date = $transaction->get("send_date");
			
				$transIn = true;
			
				if($toID != $user->get("uid")) {
					$mUser = new user($toID);
					$transIn = false;
				}
				else if($fromID != $user->get("uid")) {
					$mUser = new user($fromID);
					$transIn = true;
				}
			
				$arrow = "";
			
				if($transIn) {
					$arrow = "images/arrow_in.png";
				}
				else {
					$arrow = "images/arrow_out.png";
				}
			
				?>
			
				<div class="cartItem">
					<div class="cartMain">
						<div class="cartItemName">
							<?php echo $mUser->get("first_name")." ".$mUser->get("last_name"); ?>
						</div>
						<div class="cartItemUnit">
							<img src="<?php echo $arrow; ?>"/>
							<?php echo $user->get("currency")." ".$amount; ?>
						</div>
					</div>
					
					<div class="cartItemDate">
						<?php echo $date; ?>
					</div>
				</div>
			
				<?php
			}
		}
		else
		{
			echo "No transactions yet.";
		}
	?>
	
	
	<!-- End of content -->
	
</div>

<div class="subSpaceBottom">
	<div class="subSpaceContent">
		<div id="btnBack" class="btn btnSmall" onclick="history.go(-1);">
			Back
		</div>
	</div>
</div>