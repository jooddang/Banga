<?php
	if(!isset($_GET['p']))
		$_GET['p'] = "home";
	
	switch($_GET['p'])
	{
		case "home":
			include ('includes/pages/home.php');
			break;
		case "deposit":
			include ('includes/pages/deposit.php');
			break;
		case "depositCard":
			include ('includes/pages/depositCard.php');
			break;
		case "depositCode":
			include ('includes/pages/depositCode.php');
			break;
		case "sendmoney":
			include ('includes/pages/sendmoney.php');
			break;
		case "market":
			include ('includes/pages/market.php');
			break;
		case "logout":
			include ('includes/pages/logout.php');
			break;
		default:
			include ('includes/pages/home.php');
			break;
	}
?>