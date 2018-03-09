
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

  <title>Setting</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" media='all' rel="stylesheet" type='text/css'>
  
  <!-- Custom styles -->
  <link href="css/setting.css"  rel="stylesheet" type='text/css'>
  <!-- <link href="css/custom.css" media='all' rel="stylesheet" type='text/css'> -->
  <script src="js/setting.js"></script>
  <script type="text/javascript" src="js/simpleajax.js"></script>
</head>

<body>
<?php 
include 'include/util.php';
  session_start();
  if(isset($_SESSION["User_Name"])){
    $User_Name=$_SESSION["User_Name"];
  }else {$User_Name="xie";}
  
 // books information and path is here
  $books_path=book_path();
  $books_num_path=glob($books_path);
  $book_number=count($books_num_path);
  //$words_info=file($books_num_path[0]);
  //$words_number=count($words_info);

?>
<!-- 导航条 -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img alt="Brand" src="images/logo.jpg">FlashMe
      </a>
    </div>
    <button type="button" class="btn btn-default navbar-btn navbar-right"><a href="setting.php"><span class="glyphicon glyphicon-cog"></span></a></button>
      <button type="button" class="btn btn-success navbar-btn navbar-right"><a href="signUp.php">Sign up</button></a>
      <button type="button" class="btn btn-success navbar-btn navbar-right"><a href="signIn.php">Sign in </a></button>
      <button type="button" class="btn btn-success navbar-btn navbar-right"><a href="userInfo.php">my info </a></button>
  </div>
</nav>

<div class="wrapper">
  <div class="container">
    <div class="panel panel-info">
    <!-- Default panel contents -->
      <div class="panel-heading">Setting</div>
        <div class="panel-body">

          <form class="form-horizontal"  method="post" action="setting_handle.php">
            <div class="form-group">
              <label class="col-md-offset-2 col-md-2 control-label">choose one book</label>
              <div class="col-md-6">
          	<select class="form-control" name="book_select" id="book_value" onchange="init();">
            <!-- 自动读取单词书，默认显示为上次选择的结果 -->
           <?php 
            for($i=0;$i<$book_number;$i++){  ?>
              <option><?=basename($books_num_path[$i],".txt")?></option>
            <?php
            }
            ?>
            		
          	</select>
              </div>
            </div>

            <div class="form-group">
              <label  class=" col-md-4 control-label">choose number of words to learn per day</label>
              <div class="col-md-6">
          	<select class="form-control" name="word_num_select" id="words_value" onchange="init();"><!-- 默认显示为上次选择的结果 -->
            		<option>5</option>
                <option>60</option>
            		<option>100</option>
            		<option>140</option>
            		<option>180</option>
            		<option>220</option>
          	</select>

              </div>
            </div>

            <div class="form-group">
              <label class="col-md-offset-2 col-md-2 control-label">Total number of words</label>
              <div class="col-md-6"><!-- 使用value属性显示 -->
                    <input type="text" class="form-control" id="total_number" value="单词总数" readonly="readonly">      
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-offset-2 col-md-2 control-label">days before finished</label>
              <div class="col-md-6"><!-- 使用value属性显示 -->
                    <input type="text" class="form-control" id="days_finish" value="根据剩余单词和每日背单词数量计算得到" readonly="readonly">      
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-4 col-md-2">
                <button type="submit" class="btn btn-default">Save</button>
              </div>
              <div class="col-sm-offset-1 col-md-2">
                <a class="btn btn-default" href="setting.php">cancel</a>
                
              </div>
            </div>
          </form>
        </div>
      </div>              
    </div>
  </div>

</body>


</html>
