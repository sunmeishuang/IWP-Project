<?php
session_start();
if(isset($_SESSION["User_Name"])){
	$User_Name=$_SESSION["User_Name"]."'s";
}else{
	$User_Name="Welcome to ";
}
	
	//include("include/util.php");
	
	$type = $_GET["type"];
	if ( $type === "User_Name" ) {
		$message = "User_Name is incorrect";
		$action = "signIn.php";
	} elseif ( $type === "Password" ) {
		$message = "Password is incorrect";
		$action = "signIn.php";
	} elseif ( $type === "Password_Ensure" ) {
		$message = "Password Ensure is incorrect";
		$action = "signUp.php";
	} elseif ( $type === "passwordNotSame" ) {
		$message = "Password is not the same as Password Ensure";
		$action = "signUp.php";		
	}  elseif ( $type === "Email" ) {
		$message = "The Email cannot be empty";
		$action = "signUp.php";
	}	elseif ( $type === "sameUsername" ) {
		$message = "The User is already existed,change another oner user name";
		$action = "signUp.php";
	}	elseif ( $type === "NoSuchUser" ) {
		$message = "The User is NOT existed,Please make sure the name is correct.";
		$action = "signIn.php";
	}	else { # type === nologin
		$message = "You must sign in to use 2DO";
		$action = "sign_in_form.php";
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>FlashMe error page</title>
    <meta charset="utf-8" />
    <link href="css/error.css" type="text/css" rel="stylesheet" />
  </head>
<body>
	
	<div id="top_banner">
		<!-- <img src="#" alt="Notepad" /> -->

		<span class="left"><?=$User_Name?> <span id="logo">FlashMe</span> word recite</span>

	</div>
	
	<div id="content">
		<form method="get" action="<?=$action?>">
			<div id="error">
				<div><?= $message ?></div>
				<input class="button" type="submit" value="Return" />
			</div>
		</form>
		
</div>
</body>
</html>