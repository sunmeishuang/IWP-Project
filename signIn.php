
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

  <title>Sign In</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" media='all' rel="stylesheet" type='text/css'>
  <!-- Slide CSS -->
  <link rel="stylesheet" href="css/jquery.fullPage.css">
  <link rel="stylesheet" href="css/hoverSlide.css">
  <!-- Custom styles -->
  <link href="css/custom.css" media='all' rel="stylesheet" type='text/css'>
  <!-- bootstrap js -->
  <script src="js/bootstrap/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap/bootstrap.min.js"></script>
  <!-- Slide js -->
  <script src="js/slide/jquery-1.8.3.min.js"></script>
  <script src="js/slide/jquery.fullPage.min.js"></script>
  <script>
  $(function(){
	  $('#slide').fullpage({
		  sectionsColor: ['#1bbc9b', '#f7c229', '#b96c00', '#aaa751']
	  });
  });
  </script>
  <script type="text/javascript">
  $(function(){
	  $('.course_nr2 li').hover(function(){
		  $(this).find('.shiji').slideDown(600);
	  },function(){
		  $(this).find('.shiji').slideUp(400);
	  });
  });
  </script>
  
  
</head>

<body>
  <div id="slide">
<!-- 第一屏 -->
	<div class="section">
			<div class="wrapper1">
				<div class="container">
					<h1>Welcome to FlashMe</h1>
					<img class="logo" src="images/logo.jpg" alt="logo pic">
					<form class="form" method="post" action="sign_in_handle.php">
						<input type="text" placeholder="Username" name="User_Name">
						<input type="password" placeholder="Password" name="Password">
						<button type="submit" id="login-button">Sign In</button>
						<a href="signUp.php"> <button type="button" id="login-button">Sign up</button></a>
					</form>
				</div>

				<ul class="bg-bubbles">
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			</div>
		
		<script>
		$('#login-button').click(function (event) {
			//event.preventDefault();
			$('form').fadeOut(500);
			$('.wrapper').addClass('form-success');
		});
		</script>
	</div>


	<div class="section">
		<div class="wrapper2">
				<div class="container">
					<h1>Introduction</h1>
					<h3>FlashMe will help you recite words efficiently and constantly. You will find reciting words is never and ever a difficult and boring task. In the contrary, it will become one part of your life and give your sense of achievement. In here, you will addicted to learn words and may be you can finish learning your first word book.</h3>
				</div>
					
		</div>
		
	</div>

	<div class="section" >
		<div class="wrapper3">
				<div class="hoverSlide">
					<h1>Instruction</h1>
					<div class="course_nr">
						<ul class="course_nr2">
							<li>
								1st
								<div class="shiji">
									<h1>1st</h1>
									<p>Sign In</p>
								</div>
							</li>
							<li>
								2nd
								<div class="shiji">
									<h1>2nd</h1>
									<p>Choose word book</p>
								</div>
							</li>
							<li>
								3rd
								<div class="shiji">
									<h1>3rd</h1>
									<p>Daily number</p>
								</div>
							</li>
							<li>
								4th
								<div class="shiji">
									<h1>4th</h1>
									<p>Recite</p>
								</div>
							</li>
							<li>
								5th
								<div class="shiji">
									<h1>5th</h1>
									<p>Keep!</p>
								</div>
							</li>
							
						</ul>
					</div>
				</div>	
		</div>
	</div>
	<div class="section">
		<div class="slide">
			<div class="wrapper4">
				<div class="container-sts">
					<h1>One sentense for each day</h1>
					<div class="quote">
  						<p>You have to believe in yourself. That's the secret of success.</p>
  						<footer>—— Charles Chaplin</footer>
					</div>
				</div>
		    </div>
		<div class="slide">
			<div class="wrapper4">
				<div class="container-sts">
					<h1>One sentense for each day</h1>
					<div class="quote">
  						<p>Behind every successful man there's a lot u unsuccessful years.</p>
  						<footer>—— Bob Brown</footer>
					</div>
				</div>
		    </div>
		</div>
		<div class="slide">
			<div class="wrapper4">
				<div class="container-sts">
					<h1>One sentense for each day</h1>
					<div class="quote">
  						<p>Living without an aim is like sailing without a compass.</p>
  						<footer>—— John Ruskin</footer>
					</div>
				</div>
		    </div>
		</div>
		
		
	</div>
  </div>

</body>


</html>
