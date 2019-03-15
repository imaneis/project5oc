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
            <h1 class="page-title">List d'article</h1>
        </header>

          <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Identifiant</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Date de création</th>
                <th>Mise à jour</th>
                <th>Éditer</th>
                <th>Supprimer</th>
              </tr>
            </thead>
            <tbody>
             <?php
while ($data = $posts->fetch()) {
?>
              <tr>
                    <th><?= $data['id']; ?></th>
                    <td><?= $data['title']; ?></td>
                    <td><?= $data['author']; ?></td>
                    <td><?= $data['creation_date_fr']; ?></td>
                    <td><?php
    if ($data['update_date_fr'] === null) {
        echo "pas encore de maj";
    } else {
        echo $data['update_date_fr'];
    }
?></td>
                    <td><a class="btn btn-warning" href="admin.php?action=editPost&amp;id=<?= $data['id'] ?>">Éditer</a></td>
                    <td>
                      <a href="admin.php?action=deletePost&amp;id=<?= $data['id'] ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
                <?php
}
$posts->closeCursor();
?>
          </tbody>
          </table>
        </div>
      </article>
    </div>
  </div> 

  <?php
echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
for ($i = 1; $i <= $nombreDePages; $i++) //On fait notre boucle
    {
    //On va faire notre condition
    if ($i == $pageActuelle) //Si il s'agit de la page actuelle...
        {
        echo ' [ ' . $i . ' ] ';
    } else //Sinon...
        {
        echo ' <a href="admin.php?action=logIn&amp;page=' . $i . '">' . $i . '</a> ';
    }
}
echo '</p>';
?>

<?php
$content = ob_get_clean();
?>

<?php
require('view/backend/admin/template.php');
?>