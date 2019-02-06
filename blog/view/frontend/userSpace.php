<?php ob_start(); ?>

<div class="container">

    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="index.php?action=listPosts">blog</a></li>
      <li class="active">espace utilisateur</li>
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
                <th>Date de création</th>
                <th>Mise à jour</th>
                <th>Éditer</th>
                <th>Supprimer</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  while ($data = $posts->fetch())
                  {
                ?>
                <tr>
                    <th><?= $data['id']; ?></th>
                    <td><?= $data['title']; ?></td>
                    <td><?= $data['creation_date_fr']; ?></td>
                    <td>soon</td>
                    <td><a class="btn btn-warning" href="admin.php?action=editPost&amp;id=<?=$data['id'] ?>">Éditer</a></td>
                    <td>
                      <a href="admin.php?action=deletePost&amp;id=<?=$data['id'] ?>" class="btn btn-danger">Supprimer</a>
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

<?php $content = ob_get_clean(); ?>

<?php require('userTemplate.php'); ?>