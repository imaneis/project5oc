<?php

require_once('model/backend/member/MemberPostManager.php');
require_once('model/backend/member/MemberSessionManager.php');

class MemberBackendController
{

    public function signUp()
    {

        $MemberSessionManager = new MemberSessionManager(); // Création d'un objet

        if (isset($_POST['inscription'])) {
            // On rend inoffensif les données de l'utilisateur
            $_POST['pseudo']     = htmlspecialchars($_POST['pseudo']);
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
                $MemberSessionManager->enregistrement_membre($_POST['pseudo'], $_POST['email'], $pass_hash);

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
        if (isset($_POST['memberAdd'])) {
            extract($_POST);

            $MemberPostManager = new MemberPostManager();
            $MemberPostManager->createPost($title, $content, $_SESSION['member_name']);
            header('Location: index.php?action=signIn');
            exit();

        } else {
            require('view/backend/member/add.php');
        }

    }

    public function editPost($id)
    {

        if (isset($_POST['m_edit'])) {
            extract($_POST);

            $this->updatePost($_POST['id'], $_POST['title'], $_POST['content']);
        } else {

            $MemberPostManager = new MemberPostManager();

            $post = $MemberPostManager->getPost($id);

            require('view/backend/member/edit.php');
        }
    }

    public function updatePost($id, $postTitle, $postCont)
    {
        $MemberPostManager = new MemberPostManager();

        $post = $MemberPostManager->updatePost($id, $postTitle, $postCont);
    }

    public function deletePost($id)
    {
        $MemberPostManager = new MemberPostManager();

        $posts = $MemberPostManager->deletePost($id);
        header('Location: index.php?action=signIn');
        exit();
    }

}