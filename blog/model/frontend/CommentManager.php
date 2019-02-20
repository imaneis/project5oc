<?php
require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, approvement, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? AND approvement = 1 ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
    public function getAllComment()
    {
        $db = $this->dbConnect();

         $comments = $db->prepare('SELECT id, post_id, author, comment, approvement, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE approvement = 0 ORDER BY comment_date DESC');
        $comments->execute(array());

        return $comments;
    }
    public function deleteComment($id)
    {
        $db = $this->dbConnect();

        $comments = $db->prepare('DELETE FROM comments WHERE id = :postId');
        $comments->execute(array(':postId' => $id));

    }
    public function approveComment($id)
    {
        $db = $this->dbConnect();

        $comments = $db->prepare('UPDATE comments SET approvement = 1 WHERE id = :id');
        $comments->execute(array(':id' => $id));

    }
}