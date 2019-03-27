<?php

require_once('model/backend/member/PostManager.php');
require_once('model/backend/member/SessionManager.php');

class backendController
{

    public function signUp()
    {
        
        $SessionManager = new SessionManager(); // Création d'un objet
        
        if (isset($_POST['inscription'])) {
            // On rend inoffensif les données de l'utilisateur
            $_POST['pseudo']      = htmlspecialchars($_POST['pseudo']);
            $_POST['email']      = htmlspecialchars($_POST['email']);
            $_POST['pass']       = htmlspecialchars($_POST['pass']);
            $_POST['verif_pass'] = htmlspecialchars($_POST['verif_pass']);
            
            // Regex pour vérifier l'email
            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) {
                $email_valide = true;
            }
            
            // Verification de la validité de l'inscription
            // Verification de l'email
            if (!isset($_POST['email']) OR empty($_POST['email'])) {
                $message = "Veuillez saisir un nouvel email, il est soit vide soit déjà existant.";
                require('view/frontend/sign_up.php');
            }
            
            // Verification du mot de passe
            elseif (!isset($_POST['pass']) OR !isset($_POST['verif_pass']) OR empty($_POST['pass']) OR $_POST['pass'] != $_POST['verif_pass']) {
                $message = 'Les deux mots de passes ne sont pas identiques, veuillez les saisir à nouveau';
                require('view/frontend/sign_up.php');
            }
            
            // Si tout est ok on enregistre le membre
            else {
                // Hachage du mot de passe
                $pass_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                
                // Enregistrement du membre dans la bdd
                $SessionManager->enregistrement_membre($_POST['pseudo'], $_POST['email'], $pass_hash);
                
                $message = 'Vous avez été inscrit.';
                require('view/frontend/sign_up.php');
            }
        }
        
        // S'il n'y a pas d'inscription en cours alors on affiche le formulaire
        else {
            
            require('view/frontend/sign_up.php');
        }
    }

    public function addPost()
    {
        $erreursaisie = false;
        if (isset($_POST['submit'])) {
            extract($_POST);
            
            if ($title == '' || $content == '') {
                $erreursaisie = true;
                require('view/backend/member/add.php');
            } else {
                $PostManager = new PostManager();
                $PostManager->createPost($title, $content, $_SESSION['member_name']);
                header('Location: member.php?action=signIn');
                exit();
            }
        } else {
            require('view/backend/member/add.php');
        }
    
    }

    public function editPost($id)
    {
        $PostManager = new PostManager();
        
        $post = $PostManager->getPost($id);
        
        require('view/backend/member/edit.php');
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
        header('Location: member.php?action=signIn');
        exit();
    }
    
}