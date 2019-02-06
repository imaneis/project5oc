<?php
require_once("model/Manager.php"); // Vous n'alliez pas oublier cette ligne ? ;o)

class UserManager extends Manager
{
    public function getUsers()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, name, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr, comments_nb, posts_nb FROM users ORDER BY creation_date DESC');

        return $req;
    }

    public function deleteUser($id)
    {
        $db = $this->dbConnect();

        $users = $db->prepare('DELETE FROM users WHERE id = :postId');
        $users->execute(array(':postId' => $id));

    }
}