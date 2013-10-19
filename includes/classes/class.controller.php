<?php
	define( 'ROOT_DIR', dirname(__FILE__) );

	//import classes
	require(ROOT_DIR.'/class.database.php');
	require(ROOT_DIR.'/class.inputcontrol.php');
	require(ROOT_DIR.'/class.admin.php');
	require(ROOT_DIR.'/class.artistlogin.php');
	require(ROOT_DIR.'/class.album.php');
	require(ROOT_DIR.'/class.agenda.php');
	require(ROOT_DIR.'/class.agendaVacation.php');
	require(ROOT_DIR.'/class.agendaArtist.php');
	require(ROOT_DIR.'/class.artist.php');
	require(ROOT_DIR.'/class.artisttype.php');
	require(ROOT_DIR.'/class.booking.php');
	require(ROOT_DIR.'/class.customer.php');
	require(ROOT_DIR.'/class.ipaddress.php');
	require(ROOT_DIR.'/class.news.php');
	require(ROOT_DIR.'/class.photo.php');
	require(ROOT_DIR.'/class.promotion_photo.php');
	require(ROOT_DIR.'/class.verify.php');
	require(ROOT_DIR.'/class.concept.php');
	
	class Controller
	{
		var $inputControl = null;
		
		function __construct()
		{
			$this->inputControl = new InputControl();
			
			$this->sessionDefaults();
		}
		
		public function sessionDefaults()
		{
			if(!isset($_SESSION['loggedin']))
				$_SESSION['loggedin'] = false;
			if(!isset($_SESSION['adminid']))
				$_SESSION['adminid'] = 0;
			if(!isset($_SESSION['artistloggedin']))
				$_SESSION['artistloggedin'] = false;
			if(!isset($_SESSION['artistloginid']))
				$_SESSION['artistloginid'] = 0;
		}
		
		public function setLoggedIn($bool, $admin)
		{
			$_SESSION['loggedin'] = $bool;
			
			if($bool == false)
			{
				$_SESSION['adminid'] = 0;
			}
			else
			{
				$_SESSION['adminid'] = $admin->get("admin_id");
				$_SESSION['artistloggedin'] = false;
				$_SESSION['artistloginid'] = 0;
			}
		}

		public function setArtistLoggedIn($bool, $artistlogin)
		{
			$_SESSION['artistloggedin'] = $bool;
			
			if($bool == false)
			{
				$_SESSION['artistloginid'] = 0;
			}
			else
			{
				$_SESSION['artistloginid'] = $artistlogin->get("artist_id");
				$_SESSION['loggedin'] = false;
				$_SESSION['adminid'] = 0;
			}
		}
		
		public function getLoggedIn()
		{
			return $_SESSION['loggedin'];
		}

		public function getArtistLoggedIn()
		{
			return $_SESSION['artistloggedin'];
		}

		public function artistLogout()
		{
			$_SESSION['artistloginid'] = 0;
			$_SESSION['artistloggedin'] = false;
		}
		
		public function getAdmin()
		{
			return $_SESSION['adminid'];
		}

		public function getArtistLogin()
		{
			return $_SESSION['artistloginid'];
		}
		
		public function get($field)
		{
			switch($field)
			{
				default:
					return $this->$field;
				break;
			}
		}
		
		public function set($field, $value)
		{
			switch($field)
			{
				default:    
					$this->$field = $value;
				break;
			}
		}
	}
?>