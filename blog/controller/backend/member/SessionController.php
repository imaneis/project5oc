<?php

session_start();
require_once('model/backend/member/PostManager.php');
require_once('model/backend/member/SessionManager.php');

class SessionController
{
    
    public function checkLoginStatus()
    {
        $PostManager = new PostManager();
        
        $SessionManager = new SessionManager();
        
        if ($SessionManager->is_loggedin() != "") {
            
            $messagesParPage = 5;
            
            $total = $PostManager->totalPosts($_SESSION['member_name']);
            
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
            
            $posts = $PostManager->getPosts($premiereEntree, $messagesParPage, $_SESSION['member_name']);
            
            require('view/backend/member/memberSpace.php');
        }
        
        elseif (!$SessionManager->is_loggedin()) {
            require('view/frontend/sign_in.php');
        }
        
    }
    
    public function testLoginInfo($pseudo, $email, $pass)
    {
        
        $SessionManager = new SessionManager();
        
        if ($SessionManager->testLogin($pseudo, $email, $pass)) {
            
            $this->sendLoginInfo($pseudo, $email, $pass);
        } else {
            $error = "votre compte n'est pas encore approver !";
            require('view/frontend/sign_in.php');
        }
    }
    
    public function sendLoginInfo($pseudo, $email, $pass)
    {
        $PostManager = new PostManager();
        
        $SessionManager = new SessionManager();
        
        if ($SessionManager->login($pseudo, $email, $pass)) {
            
            $messagesParPage = 5;
            
            $total = $PostManager->totalPosts($pseudo);
            
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
            
            $posts = $PostManager->getPosts($premiereEntree, $messagesParPage, $pseudo);
            
            require('view/backend/member/memberSpace.php');
        } else {
            $error = "login ou mot de passe incorrect !";
            require('view/frontend/sign_in.php');
        }
        
    }
    public function signOut()
    {
        $SessionManager = new SessionManager();
        $SessionManager->signOut();
        header('Location: index.php');
    }
}