<?php
	if($_SESSION['ingelogd'])
	{
		$arr = array("Uitloggen" => "index.php?p=uitloggen");
		
		$userMenu = array("Profiel" => "index.php?p=profiel");
		
		if($_SESSION['gebruikerstype'] == "administrator")
		{
			$adminMenu = array(	"Nieuwsbeheer" => "index.php?p=nieuwsbeheer",
								"Albumbeheer" => "index.php?p=albumbeheer",
								"Gastenboekbeheer" => "index.php?p=gastenboekbeheer",
								"Agendabeheer" => "index.php?p=agendabeheer",
								"Rechtenbeheer" => "index.php?p=rechtenbeheer");
		}
		else if($_SESSION['gebruikerstype'] == "moderator")
		{
			$adminMenu = array(	"Nieuwsbeheer" => "index.php?p=nieuwsbeheer",
								"Albumbeheer" => "index.php?p=albumbeheer",
								"Gastenboekbeheer" => "index.php?p=gastenboekbeheer",
								"Agendabeheer" => "index.php?p=agendabeheer");
		}
		else if($_SESSION['gebruikerstype'] == "nieuwsschrijver")
		{
			$adminMenu = array(	"Nieuwsbeheer" => "index.php?p=nieuwsbeheer");
		}
		else if($_SESSION['gebruikerstype'] == "planner")
		{
			$adminMenu = array(	"Agendabeheer" => "index.php?p=agendabeheer");
		}
		else if($_SESSION['gebruikerstype'] == "fotograaf")
		{
			$adminMenu = array(	"Albumbeheer" => "index.php?p=albumbeheer");
		}
	}
	else
	{
		$arr = array("Inloggen" => "index.php?p=inloggen");
	}
	
	$arr2 = array( 	"Nieuws" => "index.php?p=home",
					"Members" => "index.php?p=members" ,
					"Agenda" => "index.php?p=agenda" ,
					"Pictures" => "index.php?p=pictures" ,
					"Gastenboek" => "index.php?p=gastenboek",
					"Forum" => "index.php?p=forum");
?>
	<table cellspacing="0" cellpadding="0">
		<tr>
			<td id="space">
				&nbsp;
			</td>
			<td id="content">
<?php
			
				
	echo "<p>";
	foreach ($arr as $key => $val) 
	{
		echo "<a href=\"$val\"><img src=\"layout/oldstyle/knoppen/$key.png\" width=\"130\" height=\"30\" border=\"0\"/></a><br/>";
	}
	echo "</p>";
	
	echo "<p>";
	foreach ($arr2 as $key => $val) 
	{
		echo "<a href=\"$val\"><img src=\"layout/oldstyle/knoppen/$key.png\" width=\"130\" height=\"30\" border=\"0\"/></a><br/>";
	}
	echo "</p>";
	
	if($_SESSION['ingelogd'])
	{
		echo "<p><b>Gebruiker Menu</b></p>";
		echo "<p>";
		foreach ($userMenu as $key => $val) 
		{
			echo "<a href=\"$val\"><img src=\"layout/oldstyle/knoppen/$key.png\" width=\"130\" height=\"30\" border=\"0\"/></a><br/>";
		}
		echo "</p>";
		
		if($_SESSION['gebruikerstype'] != lid)
		{
			echo "<p><b>Admin Menu</b></p>";
			echo "<p>";
			foreach ($adminMenu as $key => $val) 
			{
				echo "<a href=\"$val\"><img src=\"layout/oldstyle/knoppen/$key.png\" width=\"130\" height=\"30\" border=\"0\"/></a><br/>";
			}
			echo "</p>";
		}
	}
?>

		</td>
	</tr>
</table>