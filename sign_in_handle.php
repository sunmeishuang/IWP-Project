<?php
include 'include/util.php';
session_start();

$User_Name=trim(htmlspecialchars($_POST["User_Name"]));
$Password=trim(htmlspecialchars($_POST["Password"]));

$user_date_path=users_date($User_Name);
if(file_exists($user_date_path)){
	$date=file($user_date_path);
}else{
	$date=array();
}


print($User_Name);
print($Password);
	if(find_user($User_Name)){
		$info=file(users_info($User_Name),FILE_IGNORE_NEW_LINES);
		if($info[1]==$Password){
			$_SESSION["User_Name"]=$User_Name;
			if($date[0]!=date("d"))
			header("Location: recite.php");
			else  header("Location:recite_finish.php");
		}
		else{
			header("Location: error.php?type=Password");
		}
	}
	else{
		header("Location: error.php?type=NoSuchUser");
	}


?>