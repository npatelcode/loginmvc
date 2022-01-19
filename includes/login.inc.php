<?php 
include 'autoloader.inc.php';
if(isset($_POST['submit'])){
	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];
	
	//Controller
	$login = new LoginContr($uid,$pwd); 

	//ERROR Handler
 	$login->loginUser();

	// back to index page
	header("location: ../index.php?error=none");
}