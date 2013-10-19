<div class="subSpace">
	<div class="subSpaceContent">
		Deposit Money
	</div>
</div>

<div id="content">

	<!-- This is the main content, we need to use this for the logic -->
	
	<div id="selectCardBox">
		Card ending with <br/>
		<select class="selectCard" name="selectCard">
			<option name="card1">
				7100
			</option>
		</select>
	</div>
	
	<div id="newCard">
		<p>Register a new card.</p>
		
		<input class="inputLarge" type="text" name="address" value="Address (billing)"/> <br/>
		<input class="inputMedium" type="text" name="city" value="City"/> <input class="inputSmall" type="text" name="state" value="State" maxlength="16"/> <input class="inputSmall" type="text" name="zip" value="Zip" maxlength="5"/> <br/>
		<input class="inputLarge" type="text" name="cardnumber" value="Card number"/> <br/>
		<input class="inputSmall" type="text" name="expmonth" value="mm"/> <input class="inputSmall" type="text" name="expyear" value="yy"/> <input class="inputMedium" type="text" name="securityCode" value="security code"/> 
		
	</div>
	
	<div id="btnPay" class="btn btnLarge" onclick="location.reload();location.href='depositCardPay.php'">
		Pay
	</div>
	
	<!-- End of content -->
	
</div>

<div class="subSpace">
	
</div>