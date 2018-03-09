
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

  <title>Sign Up</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" media='all' rel="stylesheet" type='text/css'>
  <link href="css/sign_up.css"  rel="stylesheet" type='text/css'>

  <!-- Custom styles -->
  <!-- <link href="css/custom.css" media='all' rel="stylesheet" type='text/css'> -->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/bootstrap/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/simpleajax.js"></script>
  <script src="js/sign_up.js"></script>
</head>

<body>
<!-- 导航条 -->
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="signIn.php">
          <img alt="Brand" src="images/logo.jpg">FlashMe
        </a>
      </div>

      <button type="button" class="btn btn-default navbar-btn navbar-right"><a href="signUp.php">Sign up</a></button>
      <button type="button" class="btn btn-success navbar-btn navbar-right"><a href="signIn.php">Sign in</a></button>
      
    </div>
  </nav>

  <div class="wrapper">
    <div class="container">

  <div class="panel panel-info">
  <!-- Default panel contents -->
    <div class="panel-heading">Sign In</div>
    <div class="panel-body">
      <form class="form-horizontal" method="post" action="sign_up_handle.php" onsubmit="return checkpass()">
                <div class="form-group">
                  <label for="inputName" class="col-md-offset-1 col-md-2 control-label">User Name</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="inputName" placeholder="User Name" name="User_Name" onchange="check(this.value)"/>
                    <div id="CheckInfo"></div>
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputPassword1" class="col-md-offset-1 col-md-2 control-label">Password</label>
                  <div class="col-md-6">
                    <input type="password" class="form-control" id="inputPassword1" placeholder="Password" name="Password" onchange="checkPassWord()">
                  <div id="CheckPassWord"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword2" class="col-md-offset-1 col-md-2 control-label">Ensure Password</label>
                  <div class="col-md-6">
                    <input type="password" class="form-control" id="inputPassword2" placeholder="Password Ensure" name="Password_Ensure" onchange="checkPassWordEnsure()">
                     <div id="CheckPassWordEnsure"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-md-offset-1 col-md-2 control-label">Email</label>
                  <div class="col-md-6">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="Email" onchange="Check_Email(this.value)">
                     <div id="CheckEmail"></div>
                  </div>
                </div>

                
                <div class="form-group">
                  <div class="col-md-offset-3 col-md-10">
                    <button type="submit" class="btn btn-default"  onclick= "checkpass()">Start learning</button>
                  </div>
                </div>
              </form>
    </div>

  </div>
  
                
  </div>
</div>
</body>


</html>
