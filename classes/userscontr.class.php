<?php

class UsersContr extends Users{

	public function createUser($firstname, $lastname, $dob){
		$this->setUsers($firstname, $lastname, $dob);
	}
}

?>