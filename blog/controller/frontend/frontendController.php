<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Chargement des classes
require_once('model/frontend/PostManager.php');
require_once('model/frontend/CommentManager.php');


class frontendController
{

    public function home()
    {
        if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["message"])) {
            $mail = new PHPMailer(true); // Passing `true` enables exceptions
            try {
                //Server settings
                //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
                $mail->isSMTP(); // Set mailer to use SMTP
                $mail->Host       = 'smtp-relay.sendinblue.com'; // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true; // Enable SMTP authentication
                $mail->Username   = 'issanyimane@perso.be'; // SMTP username
                $mail->Password   = '830XEwWa1TImqp7U'; // SMTP password
                $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = 587; // TCP port to connect to
                //Recipients
                $mail->setFrom($_POST["email"], $_POST["firstname"] . " " . $_POST["lastname"]);
                $mail->addAddress('issanyimane@perso.be', 'Imane Issany'); // Add a recipient
                
                //Content
                $mail->isHTML(false); // Set email format to HTML
                $mail->Subject = 'Nouveau message';
                $mail->Body    = $_POST["message"];
                $mail->AltBody = $_POST["message"];
                
                $mail->send();
                echo 'Message has been sent';
            }
            catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        }

        require('view/frontend/home.php');
    }
    public function listPosts()
    {
        $postManager = new PostManager();
       
        $total = $postManager->totalPosts();

        $nombreDePages=ceil($total/$this->messagesParPage);

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

        $posts = $postManager->getPosts($premiereEntree, $messagesParPage);
        
        require('view/frontend/listPostsView.php');
    }

    public function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        
        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
        
        require('view/frontend/postView.php');
    }

    public function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();
        
        $affectedLines = $commentManager->postComment($postId, $author, $comment);
        
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }
    
}
  