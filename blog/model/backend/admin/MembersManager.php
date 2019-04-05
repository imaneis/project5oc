<?php
require_once("model/Manager.php");

class MembersManager extends Manager
{

    public function totalMembers()
    {
        $db = $this->dbConnect();

        $retour_total  = $db->query('SELECT COUNT(*) AS total FROM members'); //Nous récupérons le contenu de la requête dans $retour_total
        $donnees_total = $retour_total->fetch(PDO::FETCH_ASSOC); //On range retour sous la forme d'un tableau.
        $total         = $donnees_total['total'];
        return $total;

    }

    public function getMembers($premiereEntree, $messagesParPage)
    {
        $db  = $this->dbConnect();
        $req = $db->query('SELECT id, pseudo, email, approvement, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS date_inscription_fr FROM members ORDER BY date_inscription DESC LIMIT ' . $premiereEntree . ', ' . $messagesParPage . '');
        $req->execute(array(
            $premiereEntree,
            $messagesParPage
        ));
        return $req;
    }

    public function deleteMember($id)
    {
        $db = $this->dbConnect();

        $comments = $db->prepare('DELETE FROM members WHERE id = :Id');
        $comments->execute(array(
            ':Id' => $id
        ));

    }

    public function approveMember($id)
    {
        $db = $this->dbConnect();

        $comments = $db->prepare('UPDATE members SET approvement = 1 WHERE id = :Id');
        $comments->execute(array(
            ':Id' => $id
        ));
    }

}