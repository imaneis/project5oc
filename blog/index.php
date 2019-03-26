<?php
session_start();
require "vendor/autoload.php";
require('controller/frontend/frontendController.php');
require('controller/backend/admin/AdminSessionController.php');
require('controller/backend/admin/AdminBackendController.php');
require('controller/backend/member/MemberSessionController.php');
require('controller/backend/member/MemberBackendController.php');

$frontendController = new frontendController();

$AdminSessionController = new AdminSessionController();

$AdminBackendController = new AdminBackendController();

$MemberSessionController = new MemberSessionController();

$MemberBackendController = new MemberBackendController();

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        $frontendController->listPosts();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $frontendController->post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                $frontendController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    } else if ($_GET['action'] == 'logIn') {

        if(isset($_POST['logIn']))
            {
              $name = $_POST['name_or_email'];
              $email = $_POST['name_or_email'];
              $password = $_POST['password'];
                        
              $AdminSessionController->sendLoginInfo($name, $email, $password);
            }
            else{
              $AdminSessionController->checkLoginStatus();
            }
        
    } else if ($_GET['action'] == 'logOut') {
        
        $AdminSessionController->logOut();
        
    } else if ($_GET['action'] == 'adminAddPost') {

        if (!isset($_SESSION["admin_session"])) 
        {
            header('Location: index.php?action=logIn');
            exit;
        }
        else
        {
            $AdminBackendController->addpost();
        }
        
    } else if ($_GET['action'] == 'adminEditPost') {
        if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_SESSION["admin_session"])) {
            
            if (isset($_POST['adminEdit'])) {
                extract($_POST);
                
                if ($title == '' || $content == '') {
                    echo 'Erreur';
                }
                
                if ($title !== '' && $content !== '') {
                    $AdminBackendController->updatePost($_POST['id'], $_POST['title'], $_POST['content']);
                } else {
                    $AdminBackendController->editPost($_GET['id']);
                }
            } else {
                $AdminBackendController->editPost($_GET['id']);
            }
            
        } else {
             header('Location: index.php?action=logIn');
             exit;
        }
    } else if ($_GET['action'] == 'adminDeletePost') {
        if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_SESSION["admin_session"])) {
            $AdminBackendController->deletePost($_GET['id']);
        } else {
            header('Location: index.php?action=logIn');
            exit;
        }
        
    } else if ($_GET['action'] == 'showComments') {

        if (!isset($_SESSION["admin_session"])) 
        {
            header('Location: index.php?action=logIn');
            exit;
        }
        else
        {
            $AdminBackendController->showComments();
        }

    } else if ($_GET['action'] == 'deleteComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_SESSION["admin_session"])) {
            $AdminBackendController->deleteComment($_GET['id']);
        } else {
             header('Location: index.php?action=logIn');
             exit;
        }
        
    } else if ($_GET['action'] == 'approveComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_SESSION["admin_session"])) {
            $AdminBackendController->approveComment($_GET['id']);
        } else {
            header('Location: index.php?action=logIn');
             exit;
        }
        
    } else if ($_GET['action'] == 'showMembers') {
        if (!isset($_SESSION["admin_session"])) 
        {
            header('Location: index.php?action=logIn');
            exit;
        }
        else
        {
            $AdminBackendController->showMembers();
        }

    } else if ($_GET['action'] == 'approveMember') {
        if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_SESSION["admin_session"])) {
            $AdminBackendController->approveMember($_GET['id']);
        } else {
             header('Location: index.php?action=logIn');
            exit;
        }    
    } else if ($_GET['action'] == 'deleteMember') {
        if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_SESSION["admin_session"])) {
            $AdminBackendController->deleteMember($_GET['id']);
        } else {
            header('Location: index.php?action=logIn');
            exit;
        }    
    } else if ($_GET['action'] == 'signIn') {

        if(isset($_POST['signIn']))
            {
              $pseudo = $_POST['pseudo_or_email'];
              $email = $_POST['pseudo_or_email'];
              $pass = $_POST['pass'];
                        
              $MemberSessionController->testLoginInfo($pseudo,$email,$pass);
            }
            else{
              $MemberSessionController->checkLoginStatus();
            }
        
    } else if ($_GET['action'] == 'signUp') {
        
        $MemberBackendController->signUp();
        
    } else if ($_GET['action'] == 'signOut') {
        
        $MemberSessionController->signOut();
        
    } else if ($_GET['action'] == 'memberAddPost') {

         if (!isset($_SESSION["member_session"])) 
        {
            header('Location: index.php?action=signIn');
            exit;
        }
        else
        {
            $MemberBackendController->addpost();
        }
    } else if ($_GET['action'] == 'memberEditPost') {
        if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_SESSION["member_session"])) {
            
            if (isset($_POST['memberEdit'])) {
                extract($_POST);
                
                if ($title == '' || $content == '') {
                    echo 'Erreur';
                }
                
                if ($title !== '' && $content !== '') {
                    $MemberBackendController->updatePost($_POST['id'], $_POST['title'], $_POST['content']);
                } else {
                    $MemberBackendController->editPost($_GET['id']);
                }
            } else {
                $MemberBackendController->editPost($_GET['id']);
            }
            
        } else {
            header('Location: index.php?action=signIn');
            exit;
        }
    } else if ($_GET['action'] == 'memberDeletePost') {
        if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_SESSION["member_session"])) {
            $MemberBackendController->deletePost($_GET['id']);
        } else {
            header('Location: index.php?action=signIn');
            exit;
        }
    }
}
else {
   $frontendController->home();
}