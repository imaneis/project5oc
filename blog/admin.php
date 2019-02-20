<?php

require('controller/backend/backendController.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'SignIn') {

        signIn();
    }
    else if ($_GET['action'] == 'SignUp') {

        signUp();
        
    }
    else if ($_GET['action'] == 'admin') {

        admin();
        
    }
    else if ($_GET['action'] == 'adminSpace') {

        adminSpace();
        
    }
    else if ($_GET['action'] == 'addPost') {

        addpost();
        
    }
    else if ($_GET['action'] == 'editPost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {

            if(isset($_POST['submit']))
            {
                extract($_POST);

                if($title == '' || $content == ''){
                    echo 'Erreur';
                }

                if($title !== '' && $content !== ''){ 
                    updatePost($_POST['id'], $_POST['title'], $_POST['content']);
                }
                else
                {        
                    editPost($_GET['id']);
                }
            }
            else
            {        
                editPost($_GET['id']);
            }
        
        }
        else {
            echo 'Erreur';
        }
    }
    else if ($_GET['action'] == 'deletePost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            deletePost($_GET['id']);
        }
        else {
            echo 'Erreur';
        }
        
    }
    else if ($_GET['action'] == 'comments') {

        comments();
        
    }
    else if ($_GET['action'] == 'deleteComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            deleteComment($_GET['id']);
        }
        else {
            echo 'Erreur';
        }
        
    }
    else if ($_GET['action'] == 'approveComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            approveComment($_GET['id']);
        }
        else {
            echo 'Erreur';
        }
        
    }
     else if ($_GET['action'] == 'users') {

        users();
        
    }
    else if ($_GET['action'] == 'deleteUser') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            deleteUser($_GET['id']);
        }
        else {
            echo 'Erreur';
        }
        
    }
    else if ($_GET['action'] == 'userSpace') {

        userSpace();
        
    }
}
else {
   require('view/frontend/home_template.php');
}