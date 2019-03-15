<?php
function check_pseudo($pseudo)
{
    global $bdd;
    
    $req = $bdd->prepare('SELECT COUNT(*) AS nb_pseudo FROM membres WHERE pseudo = ?');
    $req->execute(array(
        $pseudo
    ));
    
    $nb_pseudo = $req->fetch();
    
    
    return $nb_pseudo['nb_pseudo'];
}