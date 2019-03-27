<?php

session_start();
require_once('model/backend/admin/PostManager.php');
require_once('model/backend/admin/SessionManager.php');

class SessionController
{

    public function checkLoginStatus()
    {
      $PostManager = new PostManager();

      $SessionManager = new SessionManager();
      
      if($SessionManager->is_loggedin()!="")
      {

        $messagesParPage=5;
       
        $total = $PostManager->totalPosts();

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

        $posts = $PostManager->getPosts($premiereEntree, $messagesParPage);

          require('view/backend/admin/adminSpace.php');
      }

      elseif(!$SessionManager->is_loggedin())
      {
        
        require('view/frontend/admin_login.php');
      }

    }
    
    public function sendLoginInfo($name,$email,$password)
    {
      $PostManager = new PostManager();

      $SessionManager = new SessionManager();
      
      if($SessionManager->login($name,$email,$password))
      {

        $messagesParPage=5;
       
        $total = $PostManager->totalPosts();

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

        $posts = $PostManager->getPosts($premiereEntree, $messagesParPage);

          require('view/backend/admin/adminSpace.php');
      }
      else
      {
        $error = "login ou mot de passe incorrect !";
        require('view/frontend/admin_login.php');
      } 

    }
    public function logOut()
    {
        $SessionManager = new SessionManager();
        $SessionManager->logout();
        header('Location: index.php');
    }

}