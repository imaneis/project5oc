<?php

require_once("model/Manager.php");

class AdminSessionManager extends Manager
{

    public function login($name, $email, $password)
    {
        try {
            $db  = $this->dbConnect();
            $req = $db->prepare("SELECT id, pseudo, email, pass FROM members WHERE pseudo=:pseudo OR email=:email");
            $req->execute(array(
                ':pseudo' => $name,
                ':email' => $email
            ));
            $adminRow = $req->fetch(PDO::FETCH_ASSOC);
            if ($req->rowCount() == 1) {
                if (password_verify($password, $adminRow['pass'])) {
                    $_SESSION['admin_session'] = $adminRow['id'];
                    return true;
                } else {
                    return false;
                }
            }
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function is_loggedin()
    {
        if (isset($_SESSION['admin_session'])) {
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
