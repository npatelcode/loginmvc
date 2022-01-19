<?php 
include 'autoloader.inc.php';
if(isset($_POST['submit'])){
	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];
	$pwdcnf = $_POST['pwdcnf'];
	$email = $_POST['email'];

	//Controller
	$signup = new SignupContr($uid,$pwd,$pwdcnf,$email); 

	//ERROR Handler
 	$signup->signupUser();

	// back to index page
	header("location: ../index.php?error=none");
}
?>