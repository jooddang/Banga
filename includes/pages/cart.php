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
	
	<div class="cartItem" onclick="location.reload();location.href='index.php?p=sendMoneyTo.php'">
		<div class="cartItemPic">
			<img src="http://www.bkfoods.com/store/media/Products/ss_size1/JFC15688.jpg">
		</div>
		<div class="cartMain">
			<div class="cartItemName">
				Rice
			</div>
			<div class="cartItemUnit">
				$0.54/lbs
			</div>
		</div>
		<div class="cartItemPrice">
			$5.40
		</div>
	</div>
	
	<div class="cartItem" onclick="location.reload();location.href='index.php?p=sendMoneyTo.php'">
		<div class="cartItemPic">
			<img src="http://strausfamilycreamery.com/images/uploads/products/organic-whole-milk.png">
		</div>
		<div class="cartMain">
			<div class="cartItemName">
				Straus Milk
			</div>
			<div class="cartItemUnit">
				$1.35/ea.
			</div>
		</div>
		<div class="cartItemPrice">
			$2.70
		</div>
	</div>

	<div class="cartItem cartSum">
		<div id="cartSumMain">
			Sum
		</div>
		<div id="cartSumPrice">
			$8.10
		</div>
	</div>
	
	
	<!-- End of content -->
	
</div>

<div class="subSpaceBottom">
	<div class="subSpaceContent">
		<div id="btnBack" class="btn btnSmall" onclick="history.go(-1);">
			Back
		</div>
	</div>
</div>