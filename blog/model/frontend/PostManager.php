<?php
require_once("model/Manager.php"); // Vous n'alliez pas oublier cette ligne ? ;o)

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, author, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, author, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function deletePost($postId)
    {
        $db = $this->dbConnect();

        $posts = $db->prepare('DELETE FROM posts WHERE id = :postId');
        $posts->execute(array(':postId' => $postId));
    }

    public function updatePost($id, $postTitle, $postCont)
    {
        $db = $this->dbConnect();

        $posts = $db->prepare('UPDATE posts SET title = :postTitle, content = :postCont, creation_date = NOW() WHERE id = :postID');
                $posts->execute(array(
                    ':postTitle' => $postTitle,
                    ':postCont' => $postCont,
                    ':postID' => $id
                ));

        header('Location: admin.php?action=adminSpace');
        exit();
    }

    public function createPost($postTitle, $postCont)
    {
        $db = $this->dbConnect();

        $posts = $db->prepare('INSERT INTO posts (title, author, content, creation_date) VALUES (?, "admin", ?, NOW())');
        $result = $posts->execute(array($postTitle , $postCont));
    }
}