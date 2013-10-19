<div class="subSpace">
	<div class="subSpaceContent">
		<a id="btnCart" style="float: right;" class="btn btnSmall" href="index.php?p=cart">
			Cart
		</a>
	</div>
</div>

<div id="content">

	<!-- This is the main content, we need to use this for the logic -->
	
	<?php 
		if(isset($_GET["uid"])) {
			$uid = $_GET["uid"];
			$mStore = new store($uid);
			
			if(isset($_GET["iid"])) {
				$iid = $_GET['iid'];
				$mItem = new item($iid);
				
				if(isset($_POST["btnCart"])) {
					$quantity = $_POST["quantity"];
					
					if($controller->get("inputControl")->checkInput($quantity, 1, "quantity", true)) {
						$cartItem = new cart_item();
						$cartItem->set("uid", $user->get("uid"));
						$cartItem->set("iid", $iid);
						$cartItem->set("quantity", $quantity);
						
						// Check whether the item allready exists in the cart (merge quantity)
						$listCartItems = cart_item::listCartItemsUser($user->get("uid"));
						
						$exists = false;
						
						for($i = 0; $i < count($listCartItems); $i++) {
							if($listCartItems[$i]->get("iid") == $iid) {
								// The list exists
								$exists = true;
								$prevQuant = $listCartItems[$i]->get("quantity");
								$newQuant = $prevQuant + $quantity;
								$listCartItems[$i]->set("quantity", $newQuant);
								$listCartItems[$i]->save();
							}
						}
						
						if(!$exists) {
							$cartItem->save();	
						}
					}
				}
				
				?>
					<div id="storeBar">
						<?php echo $mItem->get("name"); ?>
					</div>
					
					<form action="index.php?p=market&uid=<?php echo $uid;?>&iid=<?php echo $iid; ?>" method="post">
						<div class="box">
							<p>
								Quantity
							</p>
							<div class="currencyInput">
								<input type="text" name="quantity" class="inputSmall"/>
							</div>
							<p>
							</p>
						
							<input class="btn btnLarge" type="submit" name="btnCart" value="Add to cart"/>
						</div>
					</form>
				<?php
				
				
			}
			else {
				$items = item::listByShop($uid);
			
				if(count($items) > 0) {
					?>
					<div id="storeBar">
						<?php echo $mStore->get("name"); ?>
					</div>
					<?php
				
					for($j = 0; $j < count($items); $j++) {
						$item = $items[$j];
						?>
							<a class="shopItem" href="index.php?p=market&uid=<?php echo $uid; ?>&iid=<?php echo $item->get("iid"); ?>">
								<div class="itemName">
									<?php
										echo $item->get("name")." ( ".$user->get("currency")." ".$item->get("price")." / ".$item->get("unit")." )<br/>";
										echo $item->get("description");
									?>
								</div>
							</a>
						<?php
				
						?>
				
						<?php
					}
				}
				else {
					echo "There are no items in this shop.";
				}
			}
		}
		else {
	
			$stores = store::listStores();
			$left = false;
		
			for($i = 0; $i < count($stores); $i++) {
				$store = $stores[$i];
				?>
			
				<a class="btn square" href="index.php?p=market&uid=<?php echo $store->get("uid"); ?>">
					<?php echo $store->get("name"); ?>
				</a>
			
				<?php
				if($i % 2 == 1) {
					?>
						<br class="clear"/>
					<?php
				}
			}
		}
	?>
	
	<!-- End of content -->
	
</div>

<div class="subSpaceBottom">
	<?php
		if(isset($_GET["uid"])) {
			?>
				<div class="subSpaceContent">
					<div id="btnBack" class="btn btnSmall" onclick="location.reload();location.href='index.php?p=market'">
						Back
					</div>
				</div>
			<?php
		}
	?>
</div>