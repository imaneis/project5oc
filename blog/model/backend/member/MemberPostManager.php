<?php
require_once("model/Manager.php");

class MemberPostManager extends Manager
{
    public function totalPosts($_name)
    {
        $db = $this->dbConnect();

        $retour_total = $db->prepare('SELECT COUNT(*) AS total FROM posts WHERE author = :name'); //Nous récupérons le contenu de la requête dans $retour_total
        $retour_total->execute(array(
            ':name' => $_name
        ));
        $donnees_total = $retour_total->fetch(PDO::FETCH_ASSOC); //On range retour sous la forme d'un tableau.
        $total         = $donnees_total['total'];
        return $total;

    }

    public function getPosts($premiereEntree, $messagesParPage, $pseudo)
    {
        $db = $this->dbConnect();
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $req = $db->prepare('SELECT id, title, author, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr, DATE_FORMAT(update_date, \'%d/%m/%Y\') AS update_date_fr FROM posts WHERE author = :pseudo ORDER BY creation_date DESC LIMIT :premiereEntree, :messagesParPage');
        $req->execute(array(
            ':premiereEntree' => $premiereEntree,
            ':messagesParPage' => $messagesParPage,
            ':pseudo' => $pseudo
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

        header('Location: index.php?action=signIn');
        exit();
    }

    public function createPost($postTitle, $postCont, $name)
    {
        $db = $this->dbConnect();

        $posts  = $db->prepare('INSERT INTO posts (title, author, content, creation_date) VALUES (?, ?, ?, NOW())');
        $result = $posts->execute(array(
            $postTitle,
            $name,
            $postCont
        ));
    }
}