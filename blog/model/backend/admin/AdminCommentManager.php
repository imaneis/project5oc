<?php
require_once("model/Manager.php");

class AdminCommentManager extends Manager
{

	public function totalComments()
    {
        $db = $this->dbConnect();

<<<<<<< HEAD
        $retour_total=$db->query('SELECT COUNT(1) AS total FROM comments WHERE approvement = 0'); //Nous récupérons le contenu de la requête dans $retour_total
=======
        $retour_total=$db->query('SELECT COUNT(*) AS total FROM comments'); //Nous récupérons le contenu de la requête dans $retour_total
>>>>>>> master
        $donnees_total=$retour_total->fetch(PDO::FETCH_ASSOC); //On range retour sous la forme d'un tableau.
        $total=$donnees_total['total'];
        return $total;

    }

	public function getComments($premiereEntree, $messagesParPage)
    {
        $db = $this->dbConnect();
<<<<<<< HEAD
        $req = $db->query('SELECT id, post_id, author, comment, approvement, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date_fr FROM comments ORDER BY comment_date DESC LIMIT '.$premiereEntree.', '.$messagesParPage.'');
=======
        $req = $db->query('SELECT id, post_id, author, comment, approvement, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date_fr FROM comments WHERE approvement = 0 ORDER BY comment_date DESC LIMIT '.$premiereEntree.', '.$messagesParPage.'');
>>>>>>> master
        $req->execute(array($premiereEntree, $messagesParPage));
        return $req;
    }

	public function deleteComment($id)
    {
        $db = $this->dbConnect();
        
        $comments = $db->prepare('DELETE FROM comments WHERE id = :postId');
        $comments->execute(array(
            ':postId' => $id
        ));
        
    }

    public function approveComment($id)
    {
        $db = $this->dbConnect();
        
        $comments = $db->prepare('UPDATE comments SET approvement = 1 WHERE id = :commentId');
        $comments->execute(array(
            ':commentId' => $id
        ));
    }
    
}



