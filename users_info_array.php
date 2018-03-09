<?php
	include 'include/util.php';
	if(isset($_GET['User_Name'])){
		$User_Name = $_GET['User_Name'];
		if(find_user($User_Name)){
			echo "The user name (".$User_Name.") is already existed,change another one! ";
		}else{
			echo "";
		}
	}

if(isset($_GET['Email'])){
	$Email = $_GET['Email'];
	if(find_email($Email)){
		echo "The Email (".$Email.") is already existed,change another one! ";
	}else{
		echo "";
	}
}
function find_email($Email){
	$flag=0;
	$path=users_path();
 	$users_path=glob($path);
 	foreach ($users_path as $users_path) {
		$user=basename($users_path);
		$info=file(users_info($user),FILE_IGNORE_NEW_LINES);
		if($info[2]===$Email){
			$flag=1;	
			break;
		}
	}
	if($flag===1){
		return true;
	}else{
		return false;
	}
}

// 	$info_path=info_path();
// 	//$info_path="data/info.txt";
	
// 	$user_info=file($info_path);
//   	$x=count($user_info);  // row
//   	$y=3;  // 3 col
//   	$user_detail=array_fill(0,$x,array_fill(0,$y,array()));
  
//   	for($i=0;$i<count($user_info);$i++){
//     	$user_detail_info=explode(":", $user_info[$i]);
//     	$user_detail[$i][0]=$user_detail_info[0];
//     	$user_detail[$i][1]=$user_detail_info[1];
//     	$user_detail[$i][2]=$user_detail_info[2];
//  	}

// $flag=0;
// if(isset($_GET['User_Name'])){
// 	$User_Name = $_GET['User_Name'];
// 	for($i=0;$i<$x;$i++){
// 		if ($User_Name===$user_detail[$i][0])
// 			$flag=1;
// 	}
// 	if($flag==1){
// 	echo "The user name (".$User_Name.") is already existed,change another one! ";
// 	}else echo "";
// 	$flag=0;
// }



// if(isset($_GET['Email'])){
// 	$Email = $_GET['Email'];
// 	$EmailN=$Email."\n";
// 	for($i=0;$i<$x;$i++){
// 		if (($Email===$user_detail[$i][2])||($EmailN===$user_detail[$i][2]))
// 		{
// 			$flag=1;
// 			break;
// 		}
		
// 	}
// 	if($flag==1){
// 	echo "The Email (".$Email.") is already existed,change another one! ";
// 	}else echo "";
// 	$flag=0;
// }


?>