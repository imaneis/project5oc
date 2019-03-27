<?php
ob_start();
?>

<div class="container">

    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="index.php?action=listPosts">blog</a></li>
      <li class="active">espace admin</li>
    </ol>

    <div class="row">
      
      <!-- Article main content -->
      <article class="col-md-12 maincontent">

          <header class="page-header">
            <h1 class="page-title">List des utilisateur</h1>
        </header>

          <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Identifiant</th>
                <th>Nom</th>
                <th>Date de création de compte</th>
                <th>Approver l'utilisateur</th>
                <th>Supprimer l'utilisateur</th>
              </tr>
            </thead>
            <tbody>
              <?php
while ($data = $members->fetch()) {
?>
               <tr>
                    <th><?= $data['id']; ?></th>
                    <td><?= $data['pseudo']; ?></td>
                    <td><?= $data['date_inscription_fr']; ?></td>
                    <td>
                      <?php if ($data['approvement'] == 1) {
                        echo "cette utilisateur est apprové";
                      }
                      else
                      {
                      ?>
                        <a href="admin.php?action=approveMember&amp;id=<?= $data['id'] ?>" class="btn btn-success">approver</a>
                      <?php
                      }
                      ?>
                    </td>
                    <td>
                      <a href="admin.php?action=deleteMember&amp;id=<?= $data['id'] ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
                <?php
}
$members->closeCursor();
?>
           </tbody>
          </table>
        </div>
      </article>
    </div>
  </div>  

  <?php
    echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
      for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
      {
         //On va faire notre condition
        if($i==$pageActuelle) //Si il s'agit de la page actuelle...
        {
          echo ' [ '.$i.' ] '; 
        }  
        else //Sinon...
        {
          echo ' <a href="admin.php?action=showMembers&amp;page='.$i.'">'.$i.'</a> ';
        }
      }
    echo '</p>';
  ?>

<?php
$content = ob_get_clean();
?>

<?php
require('template.php');
?>