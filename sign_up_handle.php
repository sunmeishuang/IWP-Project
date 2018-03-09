<?php
include 'include/util.php';
session_start();

$User_Name=trim(htmlspecialchars($_POST["User_Name"]));
$Password=trim(htmlspecialchars($_POST["Password"]));
$Password_Ensure=trim(htmlspecialchars($_POST["Password_Ensure"]));
$Email=trim(htmlspecialchars($_POST["Email"]));

// print($User_Name);
// print($Password);
// print($Password_Ensure);
// print($Email);

if(empty($User_Name)){
	header("Location: error.php?type=User_Name");
} elseif(empty($Password)){
	header("Location: error.php?type=Password");
}elseif(empty($Password_Ensure)){
	header("Location: error.php?type=Password_Ensure");
}elseif($Password!==$Password_Ensure){
	header("Location: error.php?type=passwordNotSame");
}elseif(empty($Email)){
	header("Location: error.php?type=Email");
}
 else{
 	if(find_user($User_Name)){
 		header("Location: error.php?type=sameUsername");
 	}else{
 		mkdir(data_path()."/".$User_Name);
		$info=$User_Name."\n".$Password."\n".$Email."\n";
		file_put_contents(data_path()."/".$User_Name."/info.txt", $info);
		$_SESSION["User_Name"]=$User_Name;
		header("Location: setting.php");
 	}

 
}



?>