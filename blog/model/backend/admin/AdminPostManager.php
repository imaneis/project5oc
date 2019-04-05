<?php
require_once("model/Manager.php");

class AdminPostManager extends Manager
{
    public function totalPosts()
    {
        $db = $this->dbConnect();

        $retour_total  = $db->query('SELECT COUNT(*) AS total FROM posts'); //Nous récupérons le contenu de la requête dans $retour_total
        $donnees_total = $retour_total->fetch(PDO::FETCH_ASSOC); //On range retour sous la forme d'un tableau.
        $total         = $donnees_total['total'];
        return $total;

    }

    public function getPosts($premiereEntree, $messagesParPage)
    {
        $db  = $this->dbConnect();
        $req = $db->query('SELECT id, title, author, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr, DATE_FORMAT(update_date, \'%d/%m/%Y\') AS update_date_fr  FROM posts ORDER BY creation_date DESC LIMIT ' . $premiereEntree . ', ' . $messagesParPage . '');
        $req->execute(array(
            $premiereEntree,
            $messagesParPage
        ));
        return $req;
    }

    public function getPost($postId)
    {
        $db  = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content FROM posts WHERE id = ?');
        $req->execute(array(
            $postId
        ));
        $post = $req->fetch();

        return $post;
    }

    public function deletePost($postId)
    {
        $db = $this->dbConnect();

        $posts = $db->prepare('DELETE FROM posts WHERE id = :postId');
        $posts->execute(array(
            ':postId' => $postId
        ));
    }

    public function updatePost($id, $postTitle, $postCont)
    {
        $db = $this->dbConnect();

        $posts = $db->prepare('UPDATE posts SET title = :postTitle, content = :postCont, update_date = NOW() WHERE id = :postID');
        $posts->execute(array(
            ':postTitle' => $postTitle,
            ':postCont' => $postCont,
            ':postID' => $id
        ));

        header('Location: index.php?action=logIn');
        exit();
    }

    public function createPost($postTitle, $postCont)
    {
        $db = $this->dbConnect();

        $posts  = $db->prepare('INSERT INTO posts (title, author, content, creation_date) VALUES (?, "admin", ?, NOW())');
        $result = $posts->execute(array(
            $postTitle,
            $postCont
        ));
    }
}