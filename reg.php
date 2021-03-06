<?php

	if (isset($_POST['mail']))
	{
		$email = $_POST['mail'];
		$first = $_POST['FIRST'];
		$base_password = $_POST['password'];
		$conf_password = $_POST['conf_password'];
		
		if($base_password == $conf_password)
		{		
			$cookie_name = "USERNAME";
			$cookie_2 = "PASSWORD";
			setcookie($cookie_name,$_POST['username'],time() + 2400 *2);
			setcookie($cookie_2,$_POST['password'], time() + 2400 *2);
			include 'login.html';
		}
		else
		{
			echo("Passwords don't match");
		}
	}
	elseif (isset($_POST['Login']))
	{
		if (!isset($_COOKIE['USERNAME']))
		{
			echo 'No Recent user found with Username in this session';
			echo '<html><p><a href= "login.html">LOGIN</a></p> <p><a href="reg.html">REGISTER</a></p> </html>';
		}
		if ($_POST['username'] == $_COOKIE['USERNAME'])
		{
			if ($_POST['password'] == $_COOKIE['PASSWORD'])
			{
				echo('<h1> Login successful</h2>');
			}
			else{
				echo 'password is Incorrect';
				echo '<html><p><a href= "login.html">BACK</a></p> </html>';
			}
		}
		else{
			echo 'No user found with Username';
			echo '<html><p><a href= "login.html">LOGIN</a></p> <p><a href="reg.html">REGISTER</a></p> </html>';
		}
	}
?>
