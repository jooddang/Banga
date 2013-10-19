<div class="subSpace">
	<div class="subSpaceContent">
		Order by
	</div>
</div>

<div id="content">

	<!-- This is the main content, we need to use this for the logic -->
	
	<div class="cartItem orderMain" onclick="location.reload();location.href='index.php?p=sendmoney&btnPay=pay&uid=<?=$_GET['uid_to']?>&amount=<?=$_GET['amount']?>'">
		Deposit
	</div>

	<div class="cartItem orderMain" onclick="location.reload();location.href='sendMoneyTo.php'">
		VISA
	</div>
	
	<div class="cartItem orderMain" onclick="location.reload();location.href='sendMoneyTo.php'">
		Redeem Code
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