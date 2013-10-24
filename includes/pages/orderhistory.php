<div class="bs-docs-section">
	<div class="row">
		<div class="col-lg6">
			<div class="panel panel-default">
        		<div class="panel-heading">Order History</div>
            	<div class="panel-body">

	<!-- This is the main content, we need to use this for the logic -->
	<?php
		$orders = cart_item::orderHistoryUser($user->get("uid"));
		
		if(count($orders) > 0) {
			?><div class="list-group"><?php
		
			for($i = 0; $i < count($orders); $i++) {
				$order = $orders[$i];
				$amount = $order->get("amount");
				$quantity = $order->get("quantity");
				$date = $order->get("checkout_date");
				$iid = $order->get("iid");
				$item = new item($iid);
				$name = $item->get("name");

				?>
				<a class="list-group-item">
					<h4 class="list-group-item-heading">
						<?php echo $name." ( ".$quantity."x )"; ?>
					</h4>
					<p class="list-group-item-text">
						<?php echo "Total price: ".$user->get("currency")." ".$amount; ?>
						<?php echo "<br/>Date: ".$date; ?>
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
	?>
	
	<a class="btn btn-default" href="index.php?p=home">Back</a>
	
	<!-- End of content -->
				
				</div>
            </div> 
        </div>
    </div>
</div>