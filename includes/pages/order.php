<div class="subSpace">
	<div class="subSpaceContent">
		Order
	</div>
</div>

<div id="content">

	<?php
		if(isset($_GET["uid"])) {
			$uid = $_GET["uid"];
			$mUser = new user($uid);
			
			$cartItems = cart_item::listCartItemsUser($user->get("uid"));
			$cartSumPrice = 0;
	
			if(count($cartItems) > 0) {		
				for($i = 0; $i < count($cartItems); $i++) {
					$cartItem = $cartItems[$i];
					$item = new item($cartItem->get("iid"));
					$price = $item->get("price");
					$quantity = $cartItem->get("quantity");
					$productPrice = ($quantity * $price);
					$cartSumPrice += $productPrice;
				}
			}
			
			if(isset($_GET["payment"])) {
				$payment = $_GET["payment"];
				
				if($payment == 1) {
					// Pay with account = done
					$user->sendMoney($cartSumPrice);
					
					if($user->save()) {
						if($uid != $user->get("uid")) {
							echo $cartSumPrice." is sent to the merchant. ".$mUser->get("first_name")." ".$mUser->get("last_name")." is notified.";
						}
						else {
							echo $cartSumPrice." is sent to the merchant. You can pickup your goods.";
						}
						
						for($i = 0; $i < count($cartItems); $i++) {
							$cartItem = $cartItems[$i];
							$cartItem->delete();
						}
					}
    			}
			}
			else {
			
				if($cartSumPrice <= $user->get("deposit")) {
				?>
				<div class="box">
					<p>
						<?php
						if($uid != $user->get("uid")) {
						?>
							Pay <?php echo $user->get("currency")." ".$cartSumPrice." for user '".$mUser->get("first_name")." ".$mUser->get("last_name")."'?"; 
						} 
						else {
							echo "Pay ".$user->get("currency")." ".$cartSumPrice." for yourself?";
						}
						?>
					</p>
					<a class="btn btnLarge" href="index.php?p=order&uid=<?php echo $uid; ?>&payment=1">
						Pay now
					</a>
				</div>
			
				<?php
				}
				?>
			
				<?php
			}
		}
		else {
		
			$users = user::listUsers();
			
			for($i = 0; $i < count($users); $i++) {
				$cUser = $users[$i];
			
				if($cUser->get("uid") != $user->get("uid")) {
					?>
						<a class="contactPerson" href="index.php?p=order&uid=<?php echo $cUser->get("uid"); ?>">
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
				<a class="contactPerson" href="index.php?p=order&uid=<?php echo $user->get("uid"); ?>">
					<div class="contactName">
						Self
					</div>
				</a>
			<?php
		}
	?>
		<!-- End of content -->
	
</div>

<div class="subSpaceBottom">
	<div class="subSpaceContent">
		<?php
			if(isset($_GET["payment"])) {
		?>
			<a id="btnBack" class="btn btnSmall" href="index.php?p=home">
				Home
			</a>
		<?php
		}
		else {
		?>
			<div id="btnBack" class="btn btnSmall" onclick="history.go(-1);">
				Back
			</div>
		<?php
		}
		?>
	</div>
</div>