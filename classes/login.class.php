<?php 
class Login extends Dbh{
	private $uid = "";
	private $pwd = "";	
		
	protected function getUser($uid,$pwd)
	{	
		$sql="SELECT users_pwd from webusers WHERE users_uid=? or users_email=?";
		$stmt=$this->connect()->prepare($sql);
			
		if(!$stmt->execute([$uid,$uid])){
			$stmt = null;
			header("location:../index.php?error=stmtfailed");
			exit();
		}
		if($stmt->rowCount() == 0){
			$stmt=null;
			header("location:../index.php?error=usernotfound");
			exit();	
		}

		$pwdHashed = $stmt->fetchAll();
		$checkPassword = password_verify($pwd,$pwdHashed[0]['users_pwd']);
		if($checkPassword==false){
			$stmt=null;
			header("location:../index.php?error=wrongpassword");
			exit();
		}elseif($checkPassword==true){
			$sql="SELECT * from webusers WHERE users_uid=? or users_email=?";
			$stmt=$this->connect()->prepare($sql);
			if(!$stmt->execute([$uid,$uid])){
				$stmt = null;
				header("location:../index.php?error=stmtfailed1");
				exit();
			}
			if($stmt->rowCount() == 0){
				$stmt=null;				
				exit;
				header("location:../index.php?error=usernotfound");
				exit();	
			}
			$user = $stmt->fetchAll();
			session_start();
			$_SESSION['userid']=$user[0]['users_id'];
			$_SESSION['useruid']=$user[0]['users_uid'];
			$stmt = null;
		}		
	}

}
?>