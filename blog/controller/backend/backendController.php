<?php

require_once('model/frontend/CommentManager.php');
require_once('model/frontend/PostManager.php');
require_once('model/frontend/userManager.php');

function signIn()
{
  require('view/frontend/sign_in.php');
}

function signUp()
{
  require('view/frontend/sign_up.php');
}

function admin()
{
  require('view/frontend/admin.php');
}

function adminSpace()
{
  $postManager = new PostManager();

  $posts = $postManager->getPosts();
  require('view/frontend/adminSpace.php');
}

function addPost()
{
  $erreursaisie = false; 
  if(isset($_POST['submit']))
      {
          extract($_POST);

          if($title == '' || $content == ''){
              $erreursaisie = true;
              require('view/frontend/add.php');
          }
          else {
          $postManager = new PostManager();
          $postManager->createPost($title, $content);
          header('Location: admin.php?action=adminSpace');
          exit();
          }
      }
  else
  {        
      require('view/frontend/add.php');
  }
 
}

function createPost($postTitle, $postCont)
{
  $postManager = new PostManager();
  
  $post = $postManager->createPost($postTitle, $postCont);
}

function comments()
{
	$commentManager = new CommentManager();

	$comments = $commentManager->getAllComment();
  require('view/frontend/comments.php');
}

function deleteComment($id)
{
  $commentManager = new CommentManager();

  $comments = $commentManager->deleteComment($id);
  header('Location: admin.php?action=comments');
  exit();
}

function editPost($id)
{
  $postManager = new PostManager();

  $post = $postManager->getPost($id);

  require('view/frontend/update.php');
}

function updatePost($id, $postTitle, $postCont)
{
  $postManager = new PostManager();
  
  $post = $postManager->updatePost($id, $postTitle, $postCont);
}

function deletePost($id)
{
  $postManager = new PostManager();

  $posts = $postManager->deletePost($id);
  header('Location: admin.php?action=adminSpace');
  exit();
}

function users()
{
  $userManager = new UserManager();

  $users = $userManager->getUsers();
  require('view/frontend/users.php');
}

function deleteUser($id)
{
  $userManager = new UserManager();

  $users = $userManager->deleteUser($id);
  header('Location: admin.php?action=users');
  exit();
}

function userSpace()
{
  $postManager = new PostManager();

  $posts = $postManager->getPosts();
  require('view/frontend/userSpace.php');
}
