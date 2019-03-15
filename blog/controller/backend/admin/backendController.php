<?php

require_once('model/backend/admin/CommentManager.php');
require_once('model/backend/admin/PostManager.php');
require_once('model/backend/admin/MembersManager.php');

class backendController
{
    
    public function addPost()
    {
        $erreursaisie = false;
        if (isset($_POST['submit'])) {
            extract($_POST);
            
            if ($title == '' || $content == '') {
                $erreursaisie = true;
                require('view/backend/admin/add.php');
            } else {
                $PostManager = new PostManager();
                $PostManager->createPost($title, $content);
                header('Location: admin.php?action=logIn');
                exit();
            }
        } else {
            require('view/backend/admin/add.php');
        }
        
    }
    
    public function showComments()
    {
        $CommentManager = new CommentManager();
        
        $messagesParPage = 5;
        
        $total = $CommentManager->totalComments();
        
        $nombreDePages = ceil($total / $messagesParPage);
        
        if (isset($_GET['page'])) // Si la variable $_GET['page'] existe...
            {
            $pageActuelle = intval($_GET['page']);
            
            if ($pageActuelle > $nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
                {
                $pageActuelle = $nombreDePages;
            }
        } else // Sinon
            {
            $pageActuelle = 1; // La page actuelle est la n°1    
        }
        
        $premiereEntree = ($pageActuelle - 1) * $messagesParPage; // On calcul la première entrée à lire
        
        $comments = $CommentManager->getcomments($premiereEntree, $messagesParPage);
        
        require('view/backend/admin/comments.php');
    }
    
    public function deleteComment($id)
    {
        $CommentManager = new CommentManager();
        
        $comments = $CommentManager->deleteComment($id);
        header('Location: admin.php?action=showComments');
        exit();
    }
    
    public function approveComment($id)
    {
        $CommentManager = new CommentManager();
        
        $comments = $CommentManager->approveComment($id);
        header('Location: admin.php?action=showComments');
        exit();
    }
    
    public function editPost($id)
    {
        $PostManager = new PostManager();
        
        $post = $PostManager->getPost($id);
        
        require('view/backend/admin/edit.php');
    }
    
    public function updatePost($id, $postTitle, $postCont)
    {
        $PostManager = new PostManager();
        
        $post = $PostManager->updatePost($id, $postTitle, $postCont);
    }
    
    public function deletePost($id)
    {
        $PostManager = new PostManager();
        
        $posts = $PostManager->deletePost($id);
        header('Location: admin.php?action=logIn');
        exit();
    }
    
    public function showMembers()
    {
        $MembersManager = new MembersManager();
        
        $messagesParPage = 5;
        
        $total = $MembersManager->totalMembers();
        
        $nombreDePages = ceil($total / $messagesParPage);
        
        if (isset($_GET['page'])) // Si la variable $_GET['page'] existe...
            {
            $pageActuelle = intval($_GET['page']);
            
            if ($pageActuelle > $nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
                {
                $pageActuelle = $nombreDePages;
            }
        } else // Sinon
            {
            $pageActuelle = 1; // La page actuelle est la n°1    
        }
        
        $premiereEntree = ($pageActuelle - 1) * $messagesParPage; // On calcul la première entrée à lire
        
        $members = $MembersManager->getMembers($premiereEntree, $messagesParPage);
        
        require('view/backend/admin/showMembers.php');
    }
    
    public function approveMember($id)
    {
        $MembersManager = new MembersManager();
        
        $member = $MembersManager->approveMember($id);
        header('Location: admin.php?action=showMembers');
        exit();
    }
    
    public function deleteMember($id)
    {
        $MembersManager = new MembersManager();
        
        $member = $MembersManager->deleteMember($id);
        header('Location: admin.php?action=showMembers');
        exit();
    }
    
}