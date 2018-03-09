
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<title>User Info</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" media='all' rel="stylesheet" type='text/css'>
	<link href="css/user_info.css" media='all' rel="stylesheet" type='text/css'>

</head>

<body>
	<?php 
	include 'include/util.php';
	session_start();
	//$_SESSION["User_Name"]="xie";
	if(isset($_SESSION["User_Name"])){
		$User_Name=$_SESSION["User_Name"];
	}else {
		header("Location:signIn.php");
	}
	// user info  data/user/$name/info.txt
	$user_info_path=users_info($User_Name);
	if(file_exists($user_info_path)){
		$user_info=file($user_info_path,FILE_IGNORE_NEW_LINES);
	}else{
		print("file is not existed");  
	}

	?>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="signIn.php">
					<img alt="Brand" src="images/logo.jpg">FlashMe
				</a>
			</div>
			<button type="button" class="btn btn-success navbar-btn navbar-right"><a href="setting.php"><span class="glyphicon glyphicon-cog"></span></a></button>
      		<button type="button" class="btn btn-success navbar-btn navbar-right"><a href="signUp.php">Sign up</button></a>
      		<button type="button" class="btn btn-success navbar-btn navbar-right"><a href="signIn.php">Sign in </a></button>
      		<button type="button" class="btn btn-default navbar-btn navbar-right"><a href="userInfo.php">my info </a></button>
			
		</div>
	</nav>

	<div class="row">
	  <div class="col-md-6">
	  	<div class="wrapper">
  		  <div id="container">
    		<div class="panel panel-info">
    <!-- Default panel contents -->
      		  <div class="panel-heading">User Information</div>
        	  <div class="panel-body">
        	  	<form class="form-horizontal"  method="post" action="setting_handle.php">
            	  <div class="form-group">
                    <label class="col-md-4 control-label">user name:</label>
                    <div class="col-md-8"><!-- 使用value属性显示 -->
                      <input type="text" class="form-control" value="<?= $user_info[0]?>" readonly="readonly">      
              		</div>
 				  </div>

 				  <div class="form-group">
                    <label class="col-md-4 control-label">password:</label>
                    <div class="col-md-8"><!-- 使用value属性显示 -->
                      <input type="text" class="form-control" value="<?= $user_info[1]?>" readonly="readonly">      
              		</div>
 				  </div>

 				  <div class="form-group">
                    <label class="col-md-4 control-label">Email:</label>
                    <div class="col-md-8"><!-- 使用value属性显示 -->
                      <input type="text" class="form-control" value="<?= $user_info[2]?>" readonly="readonly">      
              		</div>
 				  </div>

 				  <div class="form-group">
                    <label class="col-md-4 control-label">choosed book(recite now):</label>
                    <div class="col-md-8"><!-- 使用value属性显示 -->
                      <input type="text" class="form-control" value="<?= $user_info[3]?>" readonly="readonly">      
              		</div>
 				  </div>
 				</form>
        	  </div>
        	</div>
          </div>
        </div>

	  </div>

	  <div class="col-md-6">
	  	<div class="wrapper">
  		  <div id="container">
    		<div class="panel panel-info">
    <!-- Default panel contents -->
      		  <div class="panel-heading">Choosed Book Information</div>
        	  <div class="panel-body">
        	  	<table class="table table-bordered table-hover">
        	  	  <thead>
	  				  <tr role="row">
						<th>book name</th>
						<th>words number</th>
						<th>recite words(per day)</th>
						<th>bwords left</th>
					  </tr>
				  </thead>
				  <tbody>
				  	<?php 
					for($i=3;$i<count($user_info);$i++){
						if(($i-3)%4==0){?>
					<tr>
						<?php for($j=0;$j<4;$j++){ ?>
						<td><?= $user_info[$i+$j]?></td>
						<?php	}?>
					</tr>
					<?php	}
					}
					?>
			
				  </tbody>
				</table>
        	  </div>
        	</div>
          </div>
        </div>

	  </div>
	</div>
	<!-- <div id="user_info">
		<h4>user information:</h4>
		<table border="1">
			<tr>
				<td><b>user name</b></td>
				<td><b>password</b></td>
				<td><b>Email</b></td>
				<td><b>choosed book(recite now)</b></td>
			</tr>
			<tr>
				<td><?= $user_info[0]?></td>
				<td><?= $user_info[1]?></td>
				<td><?= $user_info[2]?></td>
				<td><?= $user_info[3]?></td>
			</tr>
		</table>
		<h4>choosed book information:</h4>
		
		<table border="1">
			<tr>
				<td><b>book name</b></td>
				<td><b>words number</b></td>
				<td><b>recite words(per day)</b></td>
				<td><b>words left</b></td>
			</tr>
			<?php 
			for($i=3;$i<count($user_info);$i++){
				if(($i-3)%4==0){?>
				<tr>
					<?php for($j=0;$j<4;$j++){ ?>
					<td><?= $user_info[$i+$j]?></td>
					<?php	}?>
				</tr>
			</table>
			<?php	}

		}
		?>

	</div> -->

</body>

</html>
