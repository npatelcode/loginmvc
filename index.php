<?php     
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		input{
			margin-top: 5px;
		}
		.grid{
			display: grid;
			grid-template-columns: 500px 500px;
			grid-gap: 20px;
		}
	</style>
</head>
<body>
<header>
	<div>
		<ul>
			<?php if(isset($_SESSION['userid'])){ ?>
				<li> <a href="#"><?php echo $_SESSION['useruid']; ?></a></li>
				<li> <a href="includes/logout.inc.php">LOGOUT</a></li>
			<?php }else { ?>
				<li> <a href="#">SIGNUP</a></li>
				<li> <a href="#">LOGIN</a></li>
			<?php } ?>	
		</ul>
	</div>
</header>
<section>
	<div class="grid">
		<div class="signup_form">
			<h4>SIGN UP</h4>
			<p> Don't have account yet? Sign up here!</p>
			<form action="includes/signup.inc.php" method="post">
				<input type="text" name="uid" placeholder="Username"> <br>
				<input type="password" name="pwd" placeholder="Password"> <br>
				<input type="password" name="pwdcnf" placeholder="Confirm Password"> <br>
				<input type="text" name="email" placeholder="E-mail"> <br>
				<br>
				<button type="submit" name="submit"> Sign Up</button>
			</form>		
		</div>
		<div class="login_form"> 
			<h4>LOGIN</h4>
			<form action="includes/login.inc.php" method="post">
				<input type="text" name="uid" placeholder="Username"> <br>
				<input type="password" name="pwd" placeholder="Password"> <br>
				<br>
				<button type="submit" name="submit"> Sign Up</button>
			</form>
		</div>
	 </div>
</section>
</body>
</html>