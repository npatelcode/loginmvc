<?php 
class SignupContr extends SignUpUser{
	private $uid = "" ;
	private $pwd = "" ;
	private $pwdcnf = "" ;
	private $email = "" ;

	public function __construct($uid,$pwd,$pwdcnf,$email)
	{
		$this->uid = $uid;
		$this->pwd = $pwd;
		$this->pwdcnf = $pwdcnf;
		$this->email = $email;
	}

	public function signupUser(){
		if($this->emptyInput()==false){
			header("location:../index.php?error=emptyinput");
			exit();
		}
		if($this->invalidUid()==false){
			header("location:../index.php?error=invaliduid");
			exit();
		}
		if($this->invalidEmail()==false){
			header("location:../index.php?error=invalidemail");
			exit();
		}
		if($this->passwordMatch()==false){
			header("location:../index.php?error=passwordmatch");
			exit();
		}
		if(!$this->uidTakenCheck()==false){
			header("location:../index.php?error=useroremailtaken");
			exit();
		}
		$this->setUser($this->uid,$this->pwd,$this->email);
	}


	private function emptyInput(){
		if(empty($this->uid) || empty($this->pwd) || empty($this->pwdcnf) || empty($this->email)){
			return false;
		}else{
			return true;
		}
	}

	private function invalidUid(){
		if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
			return false;
		}else{
			return true;
		}
	}

	private function invalidEmail(){
		if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
			return false;
		}else{
			return true;
		}
	}

	private function passwordMatch()
	{
		if($this->pwd !== $this->pwdcnf){
			return false;
		}else{
			return true;
		}
	}

	private function uidTakenCheck()
	{
		if($this->checkUser($this->uid,$this->email)){
			return false;
		}else{
			return true;
		}
	}
}
