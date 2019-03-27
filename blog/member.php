<?php
 
require('controller/backend/member/SessionController.php');
require('controller/backend/member/backendController.php');

$SessionController = new SessionController();

$backendController = new backendController();

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'signIn') {

        if(isset($_POST['submit']))
            {
              $pseudo = $_POST['pseudo_or_email'];
              $email = $_POST['pseudo_or_email'];
              $pass = $_POST['pass'];
                        
              $SessionController->testLoginInfo($pseudo,$email,$pass);
            }
            else{
              $SessionController->checkLoginStatus();
            }
        
    } else if ($_GET['action'] == 'signUp') {
        
        $backendController->signUp();
        
    } else if ($_GET['action'] == 'signOut') {
        
        $SessionController->signOut();
        
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
    }
} else {
    require('view/frontend/home.php');
}