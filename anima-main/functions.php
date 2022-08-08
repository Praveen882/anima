<?php
	function isValidAdminLogin($email,$password)
	{
		global $db;
		$valid = false;
		$query = 'Select * from admin where email = :email and password = :password';
		$statement = $db->prepare($query);
		$statement->bindValue(':email', $email);
		$statement->bindValue(':password',$password);
		$statement->execute();
		if($statement->rowCount() == 1)
		{
			$valid = true;
		}
		else
		{
			$valid = false;
		}
		return $valid;
	}

	function isValidStudentLogin($email,$password)
	{
		global $db;
		$valid = false;
		$query = 'Select * from login where email = :email and password = :password';
		$statement = $db->prepare($query);
		$statement->bindValue(':email', $email);
		$statement->bindValue(':password',$password);
		$statement->execute();
		if($statement->rowCount() == 1)
		{
			$valid = true;
		}
		else
		{
			$valid = false;
		}
		return $valid;
	}
?>
