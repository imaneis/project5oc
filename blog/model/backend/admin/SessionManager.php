<?php

require_once("model/Manager.php");

class SessionManager extends Manager
{	

	public function login($name,$email,$password)
	{
		try
		{
			$db = $this->dbConnect();
			$req = $db->prepare("SELECT id, name, email, password FROM admin WHERE name=:name OR email=:email");
			$req->execute(array(':name'=>$name, ':email'=>$email));
			$adminRow=$req->fetch(PDO::FETCH_ASSOC);
			if($req->rowCount() == 1)
			{
				if(password_verify($password, $adminRow['password']))
				{
					$_SESSION['admin_session'] = $adminRow['id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function is_loggedin()
	{
		if(isset($_SESSION['admin_session']))
		{
			return true;
		}
	}
	public function logout()
	{
		session_destroy();
		unset($_SESSION['admin_session']);
		return true;
	}

}