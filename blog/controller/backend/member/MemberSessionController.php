<?php

require_once('model/backend/member/MemberPostManager.php');
require_once('model/backend/member/MemberSessionManager.php');

class MemberSessionController
{

    public function getPostsNumber($MemberPostManager, $pseudo)
    {

        $messagesParPage = 5;

        if ($pseudo === null) {

            $total = $MemberPostManager->totalPosts($_SESSION['member_name']);

        } else {
            $total = $MemberPostManager->totalPosts($pseudo);
        }

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

        if ($pseudo === null) {

            $posts = $MemberPostManager->getPosts($premiereEntree, $messagesParPage, $_SESSION['member_name']);

        } else {
            $posts = $MemberPostManager->getPosts($premiereEntree, $messagesParPage, $pseudo);
        }

        require('view/backend/member/memberSpace.php');

    }

    public function checkLoginStatus()
    {
        $MemberPostManager = new MemberPostManager();

        $MemberSessionManager = new MemberSessionManager();

        if ($MemberSessionManager->is_loggedin() != "") {

            $pseudo = null;

            $this->getPostsNumber($MemberPostManager, $pseudo);
        }

        elseif (!$MemberSessionManager->is_loggedin()) {
            require('view/frontend/sign_in.php');
        }

    }

    public function testLoginInfo($pseudo, $email, $pass)
    {

        $MemberSessionManager = new MemberSessionManager();

        if ($MemberSessionManager->testLogin($pseudo, $email, $pass)) {

            $this->sendLoginInfo($pseudo, $email, $pass);
        } else {
            $error = "votre compte n'est pas encore approver !";
            require('view/frontend/sign_in.php');
        }
    }

    public function sendLoginInfo($pseudo, $email, $pass)
    {
        $MemberPostManager = new MemberPostManager();

        $MemberSessionManager = new MemberSessionManager();

        if ($MemberSessionManager->login($pseudo, $email, $pass)) {

            $this->getPostsNumber($MemberPostManager, $pseudo);
        } else {
            $error = "login ou mot de passe incorrect !";
            require('view/frontend/sign_in.php');
        }

    }
    public function signOut()
    {
        $MemberSessionManager = new MemberSessionManager();
        $MemberSessionManager->signOut();
        header('Location: index.php');
    }
}