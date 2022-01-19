<?php 
class SignUpUser extends Dbh{
	private $uid = "";
	private $pwd = "";	
	private $email = "";
	
	protected function setUser($uid,$pwd,$email)
	{	
		$sql="INSERT INTO webusers (users_uid,users_pwd,users_email) values (?,?,?)";
		$stmt=$this->connect()->prepare($sql);
		$hashPwd = password_hash($pwd, PASSWORD_DEFAULT);		
		if(!$stmt->execute([$uid,$hashPwd,$email])){
			$stmt = null;
			header("location:../index.php?error=stmtfailed");
			exit();
		}
		$stmt = null;
	}

	protected function checkUser($uid,$email){
		$sql = "SELECT * from webusers where users_uid=? OR users_email=?";
		$stmt=$this->connect()->prepare($sql);
		if(!$stmt->execute([$uid,$email])){
			$stmt = null;
			header("location:../index.php?error=stmtfailed");
			exit();
		}
		if($stmt->rowCount() > 0){
			return false;			
		}else{
			return true;
		}
	}

}
?>