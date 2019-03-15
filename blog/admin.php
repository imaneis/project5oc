<?php

require('controller/backend/admin/SessionController.php');
require('controller/backend/admin/backendController.php');

$SessionController = new SessionController();

$backendController = new backendController();

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'logIn') {
        
        if (isset($_POST['submit'])) {
            $name     = $_POST['name_or_email'];
            $email    = $_POST['name_or_email'];
            $password = $_POST['password'];
            
            $SessionController->sendLoginInfo($name, $email, $password);
        } else {
            $SessionController->checkLoginStatus();
        }
        
    } else if ($_GET['action'] == 'logOut') {
        
        $SessionController->logOut();
        
    } else if ($_GET['action'] == 'addPost') {
        
        $backendController->addpost();
        
    } else if ($_GET['action'] == 'editPost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            
            if (isset($_POST['submit'])) {
                extract($_POST);
                
                if ($title == '' || $content == '') {
                    echo 'Erreur';
                }
                
                if ($title !== '' && $content !== '') {
                    $backendController->updatePost($_POST['id'], $_POST['title'], $_POST['content']);
                } else {
                    $backendController->editPost($_GET['id']);
                }
            } else {
                $backendController->editPost($_GET['id']);
            }
            
        } else {
            echo 'Erreur';
        }
    } else if ($_GET['action'] == 'deletePost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $backendController->deletePost($_GET['id']);
        } else {
            echo 'Erreur';
        }
        
    } else if ($_GET['action'] == 'showComments') {
        
        $backendController->showComments();
        
    } else if ($_GET['action'] == 'deleteComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $backendController->deleteComment($_GET['id']);
        } else {
            echo 'Erreur';
        }
        
    } else if ($_GET['action'] == 'approveComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $backendController->approveComment($_GET['id']);
        } else {
            echo 'Erreur';
        }
        
    } else if ($_GET['action'] == 'showMembers') {
        
        $backendController->showMembers();
        
    } else if ($_GET['action'] == 'approveMember') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $backendController->approveMember($_GET['id']);
        } else {
            echo 'Erreur';
        }
    } else if ($_GET['action'] == 'deleteMember') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $backendController->deleteMember($_GET['id']);
        } else {
            echo 'Erreur';
        }
    }
} else {
    require('view/frontend/home.php');
}