<?php 
class Test extends Dbh{
	public function getUsers()
	{
		$sql="SELECT * from users";
		$stmt=$this->connect()->query($sql);
		while($row=$stmt->fetch()){
			echo $row['users_firstname'] . ' ' . $row['users_lastname'] .'<br>';
		}
	}

	public function getUsersStmt($firstname, $lastname)
	{
		$sql="SELECT * from users where  users_firstname=? and users_lastname=?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$firstname,$lastname]);
		$names = $stmt->fetchAll();
		foreach($names as $name){
			echo $name['users_firstname'] . ' ' . $name['users_lastname'] .'<br>'; 
		}
	}

	public function setUsersStmt($firstname, $lastname, $dob)
	{
		$sql="INSERT INTO users (users_firstname,users_lastname,users_dob) values(?,?,?)";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$firstname,$lastname,$dob]);		
	}

} ?>