<?php
/** 
Author: Ryan Crosby 
Project: Dissertation 
Date Created: 22/03/2015
Last Edited:  07/04/2015 10.28
Source: How To Create A Secure Login in using PHP and MYSQL Available from http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL Last Accessed 01/05/2015

**/ 

include_once 'psl-config.php'; 

function secure_session() // creats a secure seesion 
{
	
	$session_name = "sec_session_id"; //Name of the session 
	$secure = 'SECURE'; //Blocks JavaScript from accessing ID 
	$httponly  = true; //Uses Only cookies 
	
	if((ini_set('session.use_only_cookies', 1)) === FALSE) 
	{
		header("Location: ../error.php?err=Could not make a safe session (ini_set)");
		exit(); 
	}
	
	// Get Current Cookie Params 
	$cookieParams = session_get_cookie_params();
	session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
	session_name("sec_session_id"); //Starts a session with curent id 
	session_start();
	session_regenerate_id(true);
	
}

function login($username, $password, $mysqli)
{
	
	if($statement = $mysqli->prepare("SELECT UserName, Password FROM userdetails WHERE UserName = ?")) //Selects the details from the database 
	{
		
		$statement->bind_param('s', $username);
		$statement->execute();
		$statement->store_result();
		$statement->bind_result($username, $Password);
		$statement->fetch();
		
		$user_browser = $_SERVER['HTTP_USER_AGENT'];
		//store the details
		
		
		if($password == $Password)
		{
			//Passwords Match 
		
	    $_SESSION['password'] = "test";
		$_SESSION['username'] = "test";
		$_SESSION['userB'] = $user_browser;
		$_SESSION['login_string'] = $username.$password.$user_browser;
		
		//Stores the user details 
		//Remember once sessions are fixed implement hash protocol
		
		return true;
		
		}
		else 
		{
		return false; 
		}
		
		
	}
		
		
	
	else 
	{
		
		//No Match 
		return false; 
	}
}

function login_check($mysqli)
{ 
	
 // Checking set varibles 

		
	$user_browser = $_SERVER['HTTP_USER_AGENT'];
	$username = "test";
	$password = "test";
	$_SESSION['password'] = $password;
	$_SESSION['username'] = $username;
	$_SESSION['userB'] = $user_browser;
	$_SESSION['login_string'] = $username.$password.$user_browser;
	//var_dump($_SESSION);
	
	if (isset($_SESSION['username'], $_SESSION['login_string']))
	{
	
		$username = $_SESSION['username'];
		$login_string = $_SESSION['login_string'];
		$user_browser = $_SERVER['HTTP_USER_AGENT']; 
		
		if ($statement = $mysqli->prepare("SELECT Password FROM userdetails WHERE UserName=?"))
		{
			
			$statement->bind_param('i', $username);
			$statement->execute();
			$statement->store_result(); 
			
		
			if($statement->num_rows == 1)
			{
				
				$statement->bind_result($password);
				$statement->fetch();
				$login_check = $password . $username . $user_browser;
				
				if($login_check == $login_string)
				{
					return true;
					
				}
				else
			    {
					return false; 
				}
				
		       return true;		
			}
			else 
			{
				return false;
			}
		}
		else 
		{
			return false;
		}
			
			}
			
		else {
			return false;
		}
		
	
	
	
	
}

?>