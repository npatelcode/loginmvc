<?php 
class Users extends Dbh{

	protected function getUser($name)
	{
		$sql = "SELECT * FROM users WHERE users_firstname=?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$name]);
		$row = $stmt->fetchAll();
		return $row;
	} 
	public function setUsers($firstname, $lastname, $dob)
	{
		$sql="INSERT INTO users (users_firstname,users_lastname,users_dob) values(?,?,?)";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$firstname,$lastname,$dob]);		
	}
}
?>