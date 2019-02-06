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
			<h1 class="page-title">List des commentaires</h1>
		</header>

      	<div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Identifiant de l'article</th>
                <th>Nom de l'utilisateur</th>
                <th>Commentaire</th>
                <th>Date de création</th>
                <th>Approuver</th>
                <th>Supprimer</th>
              </tr>
            </thead>
            <tbody>
                <?php
                  while ($data = $comments->fetch())
                  {
                ?>
                <tr>
                    <th><?= $data['post_id']; ?></th>
                    <td><?= $data['author']; ?></td>
                    <td><?= $data['comment']; ?></td>
                    <td><?= $data['comment_date_fr']; ?></td>
                    <td><button class="btn btn-warning">Approuver</button></td>
                    <td>
                      <a href="admin.php?action=deleteComment&amp;id=<?=$data['id'] ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
  
                <?php
                  }
                    $comments->closeCursor();
                ?>
            </tbody>
          </table>
        </div>
      </article>
    </div>
  </div> 

<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>