<div class="bs-docs-section">
	<div class="row">
		<div class="col-lg6">
			<div class="panel panel-default">
        		<div class="panel-heading">Order History</div>
            	<div class="panel-body">

	<!-- This is the main content, we need to use this for the logic -->
	<?php
		if(!isset($_GET["oid"])) {
	
			$orders = order::listOrders($user->get("uid"));
		
			if(count($orders) > 0) {
				?><div class="list-group"><?php
		
				for($i = 0; $i < count($orders); $i++) {
					$order = $orders[$i];
				
					$oid = $order->get("oid");
				
					$toID = $order->get("uidt");
					$fromID = $order->get("uidf");
				
					$amount = $order->get("amount");
					$date = $order->get("date");
				
					$transIn = true;
					$forSelf = false;
				
					$mUser = "";
			
					if($toID != $user->get("uid")) {
						$mUser = new user($toID);
						$transIn = false;
					}
					else if($fromID != $user->get("uid")) {
						$mUser = new user($fromID);
						$transIn = true;
					}
					else {
						$mUser = $user;
						$forSelf = true;
						$transIn = false;
					}
			
					$arrow = "";
			
					if($transIn) {
						$arrow = "images/arrow_in.png";
					}
					else if($forSelf) {
						$arrow = "";
					}
					else {
						$arrow = "images/arrow_out.png";
					}
				
					?>
					<a class="list-group-item" href="index.php?p=orderhistory&oid=<?php echo $oid; ?>">
						<h4 class="list-group-item-heading">
							<?php 
								if($transIn) {
									echo "From: ";
								}
								else if($forSelf) {
								
								}
								else {
									echo "To: ";
								}
							
								echo $mUser->get("first_name")." ".$mUser->get("last_name");
							?>
						</h4>
						<p class="list-group-item-text">
							<?php
							if(!$forSelf) {
							?>
							<img src="<?php echo $arrow; ?>"/>
							<?php
							}
							?>
							<?php echo "Total price: ".$userCurrency." ".$amount; ?>
							<?php echo "<br/>Date: ".$date."<br/>"; ?>
						</p>
					</a>
					<?php
				}
				?>
				</div>
				<?php
			}
			else
			{
				echo "<p>No transactions yet.</p>";
			}
		}
		else {
			$oid = $_GET["oid"];
			$order = new order($oid);
			
			$toID = $order->get("uidt");
			$fromID = $order->get("uidf");
		
			$amount = $order->get("amount");
			$date = $order->get("date");
		
			$transIn = true;
			$forSelf = false;
		
			$mUser = "";
	
			if($toID != $user->get("uid")) {
				$mUser = new user($toID);
				$transIn = false;
			}
			else if($fromID != $user->get("uid")) {
				$mUser = new user($fromID);
				$transIn = true;
			}
			else {
				$mUser = $user;
				$forSelf = true;
				$transIn = false;
			}
			?>
			
			<legend>Order: <?php echo $mUser->get("first_name")." ".$mUser->get("last_name");?></legend>
			
			<?php
		}
	?>
	
	<a class="btn btn-default" onclick="history.go(-1);">Back</a>
	
	<!-- End of content -->
				
				</div>
            </div> 
        </div>
    </div>
</div>