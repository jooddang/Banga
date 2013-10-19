<div class="subSpace">
	<div class="subSpaceContent">
		Cart
		<?php
			$users = user::listUsers();
			
			for($i = 0; $i < count($users); $i++) {
				$cUser = $users[$i];
				
				if($cUser->get("uid") != $user->get("uid")) {
					?>
						
						<div id="btnBack" class="btn btnSmall" onclick="location.reload();location.href='index.php?p=order&uid_to=<?=$cUser->get("uid")?>&amount=8.40'">
							Order
						</div>
					<?php
					break;
				}
			}
		?>
	</div>
</div>

<div id="content">

	<!-- This is the main content, we need to use this for the logic -->
	
	<?php
		$cartItems = cart_item::listCartItemsUser($user->get("uid"));
		$cartSumPrice = 0;
		
		if(count($cartItems) > 0) {		
			for($i = 0; $i < count($cartItems); $i++) {
				$cartItem = $cartItems[$i];
				$item = new item($cartItem->get("iid"));
			
				$itemName = $item->get("name");
				$price = $item->get("price");
				$currency = $user->get("currency");
				$unit = $item->get("unit");
				$picture = $item->get("photo");
				$quantity = $cartItem->get("quantity");
				$productPrice = ($quantity * $price);
			
				$cartSumPrice += $productPrice;
			
				$picDir = explode("/", ROOT_DIR);
				$directory = "";
			
				for($j = 0; $j  < count($picDir) - 2; $j++ ) {
					$directory .= "/".$picDir[$j];
				}
			
				?>
			
				<div class="cartItem">
					<div class="cartItemPic">
						<img src="<?php echo $picture; ?>"/>
					</div>
					<div class="cartMain">
						<div class="cartItemName">
							<?php echo $itemName." (".$quantity.")"; ?>
						</div>
						<div class="cartItemUnit">
							<?php echo $currency." ".$price." / ".$unit; ?>
						</div>
					</div>
					<div class="cartItemPrice">
						<?php echo $currency." ".$productPrice; ?>
					</div>
				</div>
			
				<?php
			}
		}
		else {
			echo "The cart is empty.";
		}
		
		if(count($cartItems) > 0) {
			?>
				<div class="cartItem cartSum">
					<div id="cartSumMain">
						Sum
					</div>
					<div id="cartSumPrice">
						<?php echo $currency." ".$cartSumPrice; ?>
					</div>
				</div>
			<?php
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