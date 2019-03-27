<?php

require_once('model/backend/admin/AdminCommentManager.php');
require_once('model/backend/admin/AdminPostManager.php');
require_once('model/backend/admin/MembersManager.php');

class AdminBackendController
{

    public function getCount($test)
  {

     $messagesParPage=5;

     if ($test) {
         $AdminCommentManager = new AdminCommentManager();
         $total = $AdminCommentManager->totalComments();
     }
     else
     {
         $MembersManager = new MembersManager();
         $total = $MembersManager->totalMembers();
     }
       

        $nombreDePages=ceil($total/$messagesParPage);

        if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
        {
           $pageActuelle=intval($_GET['page']);
       
           if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
           {
                $pageActuelle=$nombreDePages;
           }
        }
        else // Sinon
        {
             $pageActuelle=1; // La page actuelle est la n°1    
        }
         
        $premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire

        if ($test) {
            $comments = $AdminCommentManager->getcomments($premiereEntree, $messagesParPage);
        
            require('view/backend/admin/comments.php');
        }
        else
        {
            $members = $MembersManager->getMembers($premiereEntree, $messagesParPage);

            require('view/backend/admin/showMembers.php');
        }

  }

    public function addPost()
    {
        if (isset($_POST['adminAdd'])) {
            extract($_POST);

            $AdminPostManager = new AdminPostManager();
            $AdminPostManager->createPost($title, $content);
            header('Location: index.php?action=logIn');
            exit();
            
        }
        else
        {
            require('view/backend/admin/add.php');
        }
    }

    public function showComments()
    {

        $test = true;

        $this->getCount($test);
    }

    public function deleteComment($id)
    {
        $AdminCommentManager = new AdminCommentManager();
        
        $comments = $AdminCommentManager->deleteComment($id);
        header('Location: index.php?action=showComments');
        exit();
    }

    public function approveComment($id)
    {
        $AdminCommentManager = new AdminCommentManager();
        
        $comments = $AdminCommentManager->approveComment($id);
        header('Location: index.php?action=showComments');
        exit();
    }

    public function editPost($id)
    {
        $AdminPostManager = new AdminPostManager();
        
        $post = $AdminPostManager->getPost($id);
        
        require('view/backend/admin/edit.php');
    }

    public function updatePost($id, $postTitle, $postCont)
    {
        $AdminPostManager = new AdminPostManager();
        
        $post = $AdminPostManager->updatePost($id, $postTitle, $postCont);
    }

    public function deletePost($id)
    {
        $AdminPostManager = new AdminPostManager();
        
        $posts = $AdminPostManager->deletePost($id);
        header('Location: index.php?action=logIn');
        exit();
    }

    public function showMembers()
    {

        $test = false;

        $this->getCount($test);
    }

    public function approveMember($id)
    {
        $MembersManager = new MembersManager();
        
        $member = $MembersManager->approveMember($id);
        header('Location: index.php?action=showMembers');
        exit();
    }

    public function deleteMember($id)
    {
        $MembersManager = new MembersManager();
        
        $member = $MembersManager->deleteMember($id);
        header('Location: index.php?action=showMembers');
        exit();
    }
    
}