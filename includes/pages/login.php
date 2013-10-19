<div class="subSpace">
	<div class="subSpaceContent">
		Login
	</div>
</div>
<div id="content">
	<?php
		if(isset($_POST['register'])) {
			include 'createAccount.php';
		}
		else {
	?>
	<form method="post" action="index.php?p=home">
		<div class="box">
			<p>
				Username: <br/>
				<input type="text" name="username"/>
			</p>
			<p>
				Password: <br/>
				<input type="password" name="userpass"/>
			</p>
			<p>
				<input class="btn btnSmall" type="submit" value="login" name="login"/>
			</p>
			<p>
				<input class="btn btnSmall" type="submit" value="register" name="register"/>
			</p>
		</div>
	</form>
	<?php
		}
	?>
</div>
<div class="subSpace">
	<div class="subSpaceContent">
	</div>
</div>