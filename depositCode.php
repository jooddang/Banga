<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>
			Banga: Transfer money around the globe
		</title>
		
		<!-- Some SEO -->
		<meta name="Generator" content="Notepad++"/>
		<meta name="Author" content="Banga"/>
		<meta name="Keywords" content="money, transfer, global, world, currency, bitcoins"/>
		<meta name="Description" content="Banga"/>
		<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1"/>
		
		<!-- Style sheets importeren -->
		<link rel="stylesheet" type="text/css" href="styles/style.css"/>
	</head>
	<body>
		<div id="header">
			<div id="headContent">
				<div id="logo" onclick="location.reload();location.href='index.php'">
					Banga.
				</div>
				<div id="headRight">
					<div id="user">
						Alice
					</div>
				
					<div id="amount">
						($ 200.00 USD)
					</div>
				
					<a id="btnHistory" class="btn btnSmall" href="history.php">
						History
					</a>
				</div>
			</div>
		</div>
		
		<div class="subSpace">
			<div class="subSpaceContent">
				Deposit Money
			</div>
		</div>
		
		<div id="main">
			<div id="content">
			
				<!-- This is the main content, we need to use this for the logic -->
				
				<div class="currencyInput">$ 
					<input type="text" name="moneyAmount"/>
				</div>
				
				<div id="btnCode" class="btn btnLarge" onclick="location.reload();location.href='depositCode.php'">
					Redeem Code
				</div>
				
				<!-- End of content -->
				
			</div>
		</div>
		<div class="subSpace">
			
		</div>
		<div id="footer">
			Copyright - Banga. 2013 beta
		</div>
	</body>
</html>