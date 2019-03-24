<?php

require_once("model/Manager.php");

class MemberSessionManager extends Manager
{	

	public function enregistrement_membre($pseudo, $email, $pass)
    {
        $db = $this->dbConnect();
        
        $req = $db->prepare('INSERT INTO members(pseudo, pass, email, date_inscription, approvement) VALUES(:pseudo, :pass, :email, CURDATE(), 0)');
        $req->execute(array(
        	'pseudo' => $pseudo,
            'email' => $email,
            'pass' => $pass
        ));
        $req->closeCursor();
        return $req;
    }

    public function testLogin($pseudo,$email,$pass)
    {
    	$db = $this->dbConnect();
		$req = $db->prepare("SELECT * FROM members WHERE pseudo=:pseudo OR email=:email");
		$req->execute(array(':pseudo'=>$pseudo, ':email'=>$email));
		$memberRow=$req->fetch(PDO::FETCH_ASSOC);

		if($memberRow['approvement'] == 1)
		{
			
			return true;
		}
		else
		{
			return false;
		}
			

    }
 
	public function login($pseudo,$email,$pass)
	{
		try
		{
			$db = $this->dbConnect();
			$req = $db->prepare("SELECT id, pseudo, email, pass FROM members WHERE pseudo=:pseudo OR email=:email");
			$req->execute(array(':pseudo'=>$pseudo, ':email'=>$email));
			$memberRow=$req->fetch(PDO::FETCH_ASSOC);
			if($req->rowCount() == 1)
			{
				if(password_verify($pass, $memberRow['pass']))
				{
					$_SESSION['member_session'] = $memberRow['id'];
					$_SESSION['member_name'] = $memberRow['pseudo'];
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
		if(isset($_SESSION['member_session']))
		{
			return true;
		}
	}
	public function signout()
	{
		session_destroy();
		unset($_SESSION['member_session']);
		return true;
	}

}