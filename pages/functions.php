<?php

	function email_exists($email, $con)
	{
		$rsEmails = mysqli_query($con, "SELECT * FROM account WHERE email = '$email'");
		if (mysqli_num_rows($rsEmails) == 1){
			return true;
		}else{
			return false;
		}
	}
	
    function logged_in()
	{
			if(isset($_SESSION['email']) || isset($_COOKIE['email']))
			{
				return true;
			}
			else
			{
				return false;
			}
	}
?>