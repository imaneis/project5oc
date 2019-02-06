<?php ob_start(); ?>

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
                <th>Nombre de commentaire</th>
                <th>Nombre d'article</th>
                <th>Supprimer l'utilisateur</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  while ($data = $users->fetch())
                  {
                ?>
                <tr>
                    <th><?= $data['id']; ?></th>
                    <td><?= $data['name']; ?></td>
                    <td><?= $data['creation_date_fr']; ?></td>
                    <td><?= $data['comments_nb']; ?></td>
                    <td><?= $data['posts_nb']; ?></td>
                    <td>
                      <a href="admin.php?action=deleteUser&amp;id=<?=$data['id'] ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
                <?php
                  }
                    $users->closeCursor();
                ?>
            </tbody>
          </table>
        </div>
      </article>
    </div>
  </div>  

<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>