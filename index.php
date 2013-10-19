<?php
	session_start();
	
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
?>

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
	
		<?php
			// Import controller class
			require('includes/classes/class.controller.php');
			
			// Create instance of controller
			$controller = new Controller();
			$wrongLogin = false;

			if(isset($_POST['login'])) {
			
				// User tried to log in
				$user = user::checkLogin($_POST['username'], $_POST['userpass']);
			
				if($user->get("uid") >= 1)
				{
					$controller->setLoggedIn(true, $user);
				}
				else 
				{
					$wrongLogin = true;
				}
			}	
		?>
		
		<div id="header">
			<div id="headContent">
				<div id="logo" onclick="location.reload();location.href='index.php?p=home'">
					Banga.
				</div>
				
				<?php
					if($controller->getLoggedIn()) {
						$user = new user($controller->getUserID());
				?>
				<div id="headRight">
					<div id="user">
						<?php
							echo $user->get("first_name");
						?>
					</div>
				
					<div id="amount">
						<?php
							echo "( ".$user->get("currency")." ".$user->get("deposit")." )";
						?>
					</div>
					
					<div id="btnHistory" class="btn btnSmall" onclick="location.reload();location.href='index.php?p=history'">
						History
					</div>
				
					<div id="btnHistory" class="btn btnSmall" onclick="location.reload();location.href='index.php?p=logout'">
						Log out
					</div>
				</div>
				<?php
					}
				?>
			</div>
		</div>
		
		<!-- This is the main content, switching it with a php switch -->
		
		<?php
			if($controller->getLoggedIn()) {
				include('includes/pages.php');
			}
			else {
				if(!isset($_GET['p']))
					$_GET['p'] = "home";
					
				switch($_GET['p'])
				{	
					case "home":
						include ('includes/pages/login.php');
						break;
					case "register":
						include ('includes/pages/createAccount.php');
						break;
					default:
						include ('includes/pages/login.php');
						break;
				}
			}
		?>
		
		<!-- End of content -->
			
		<div id="footer">
			Copyright - Banga. 2013 beta
		</div>
	</body>
</html>