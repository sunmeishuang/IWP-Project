
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recite</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" media='all' rel="stylesheet" type='text/css'>
  <!-- Custom styles -->
  <link href="css/recite.css" media='all' rel="stylesheet" type='text/css'>
  <link href="css/motocard2.css" media='all' rel="stylesheet" type='text/css'>
  <link href="css/prograss.css" media='all' rel="stylesheet" type='text/css'>
  <link href="css/time.css" media='all' rel="stylesheet" type='text/css'>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/bootstrap/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap/bootstrap.min.js"></script>
   <script type="text/javascript" src="js/Time/time.js"></script>

  <script type="text/javascript" src="js/simpleajax.js"></script>
  <script type="text/javascript" src="js/recite.js"></script>
</head>

<body>
<?php 
include 'include/util.php';
  session_start();
  if(isset($_SESSION["User_Name"])){
    $User_Name=$_SESSION["User_Name"];
  }else {
    header("Location:signIn.php");
  } 
?>

  <!-- 导航条 -->
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
      <button type="button" class="btn btn-success navbar-btn navbar-right"><a href="userInfo.php">my info </a></button>
    </div>
  </nav>

  <div class="wrapper">
    <div id="container">
     
          <div class="panel panel-info">
            <!-- Default panel contents -->
            <div class="panel-heading">Recite</div>
            <div class="panel-body">
              
              <!-- 进度条 -->
              <div class="prog-container">
                <div class="progress">
                  <div class="progress-bar progress-bar-success" style="width: 0%">
                    已背单词数
                  </div>
                  <div class="progress-bar progress-bar-warning" style="width: 100%">
                    未背词数
                  </div>
                  <!-- <div class="progress-bar progress-bar-danger" style="width: 25%">
                    没记住,背会两遍单词数
                  </div>
                  <div class="progress-bar progress-bar-null" style="width: 25%">
                    还没有背,背会0遍单词数
                  </div> -->
                </div>
              </div>

              <div class="row">
                <div class="col-md-8">
              <!-- 卡牌2 -->
                  <div class="cd-gallery-container">
                    <div class="cd-gallery cd-container">
                      <ul class="cd-item-wrapper">
                        <li data-type="next word" class="is-visible"><img src="images/recite1.jpg"><div class="words">english word</div></li>
                        <li data-type="answer" class="is-hidden"><img src="images/recite2.jpg"><div class="words">chinese</div></li>
                      </ul>
                    </div> 

                    <nav class="cd-filter">
                      <ul>
                        <li><a data-type="answer" href="#0" onclick="Remember()">remember</a></li>
                        <li><a data-type="answer" href="#0" onclick="Forget()">forget</a></li>
                        <li><a data-type="answer" href="#0" onclick="So_easy()">so easy</a></li>
                        <li><a data-type="next word" href="#0" onclick="Next()">next</a></li>
                      </ul>
                    </nav> 
                  </div>
                </div>
                <div class="col-md-4">
              <!-- 计时 -->
                  <div class="game_time">
                    <div class="hold">
                      <div class="pie pie1"></div>
                    </div>
                    <div class="hold">
                      <div class="pie pie2"></div>
                    </div>
                    <div class="bg"> </div>
                    <div class="time"></div>
                  </div>
  
                </div>
              </div>
          </div>
          </div>
          <script type="text/javascript" src="js/motocard/motocard2.js"></script>

  </div>
</div>
</body>


</html>
