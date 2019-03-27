<?php

require_once('model/backend/admin/AdminCommentManager.php');
require_once('model/backend/admin/AdminPostManager.php');
require_once('model/backend/admin/MembersManager.php');

class AdminBackendController
{

    public function addPost()
    {
        $erreursaisie = false;
        if (isset($_POST['adminAdd'])) {
            extract($_POST);
            
            if ($title == '' || $content == '') {
                $erreursaisie = true;
                require('view/backend/admin/add.php');
            } else {
                $AdminPostManager = new AdminPostManager();
                $AdminPostManager->createPost($title, $content);
                header('Location: index.php?action=logIn');
                exit();
            }
        } else {
            require('view/backend/admin/add.php');
        }
    
    }

    public function showComments()
    {
        $AdminCommentManager = new AdminCommentManager();

       
        $total = $AdminCommentManager->totalComments();

        $nombreDePages=ceil($total/$this->messagesParPage);

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
         
        $premiereEntree=($pageActuelle-1)*$this->messagesParPage; // On calcul la première entrée à lire

        $comments = $AdminCommentManager->getcomments($premiereEntree, $this->messagesParPage);
        
        require('view/backend/admin/comments.php');
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
        $MembersManager = new MembersManager();
       
        $total = $MembersManager->totalMembers();

        $nombreDePages=ceil($total/$this->messagesParPage);

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
         
        $premiereEntree=($pageActuelle-1)*$this->messagesParPage; // On calcul la première entrée à lire

        $members = $MembersManager->getMembers($premiereEntree, $this->messagesParPage);

        require('view/backend/admin/showMembers.php');
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