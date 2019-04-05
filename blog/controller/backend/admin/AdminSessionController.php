<?php


require_once('model/backend/admin/AdminPostManager.php');
require_once('model/backend/admin/AdminSessionManager.php');

class AdminSessionController
{

    public function getPostsNumber($AdminPostManager)
    {

        $messagesParPage = 5;

        $total = $AdminPostManager->totalPosts();

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

        $posts = $AdminPostManager->getPosts($premiereEntree, $messagesParPage);

        require('view/backend/admin/adminSpace.php');

    }

    public function checkLoginStatus()
    {
        $AdminPostManager = new AdminPostManager();

        $AdminSessionManager = new AdminSessionManager();

        if ($AdminSessionManager->is_loggedin() != "") {

            $this->getPostsNumber($AdminPostManager);
        }

        elseif (!$AdminSessionManager->is_loggedin()) {

            require('view/frontend/admin_login.php');
        }

    }

    public function sendLoginInfo($name, $email, $password)
    {
        $AdminPostManager = new AdminPostManager();

        $AdminSessionManager = new AdminSessionManager();

        if ($AdminSessionManager->login($name, $email, $password)) {

            $this->getPostsNumber($AdminPostManager);

        } else {
            $error = "login ou mot de passe incorrect !";
            require('view/frontend/admin_login.php');
        }

    }
    public function logOut()
    {
        $AdminSessionManager = new AdminSessionManager();
        $AdminSessionManager->logout();
        header('Location: index.php');
    }

}