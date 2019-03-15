<?php

function enregistrement_membre($pseudo, $pass, $email)
{
    global $bdd;
    
    $req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
    $req->execute(array(
        'pseudo' => $pseudo,
        'pass' => $pass,
        'email' => $email
    ));
    $req->closeCursor();
}