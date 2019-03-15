<?php
ob_start();
?>

<div class="container">

    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="index.php?action=listPosts">blog</a></li>
      <li class="active"><?= htmlspecialchars($post['title']) ?></li>
    </ol>

    <div class="row">
      
      <!-- Article main content -->
      <article class="col-md-12 maincontent">
        <!-- Project Details Go Here -->
      <h2 class="text-uppercase"><?= htmlspecialchars($post['title']) ?></h2>

      <p>
          <?= nl2br($post['content']) ?>
    </p>

      <ul>
        <li>Date:<?= $post['creation_date_fr'] ?></li>
        <li>Auteur:<?= htmlspecialchars($post['author']) ?></li>
        <li>Categorie: Formation</li>
      </ul>


        <?php

while ($comment = $comments->fetch()) {
?>
          <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <?php
}
?>

        <h2>Ajouter un Commentaire</h2>

            <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
              <div class="form-group">
                <label for="author">Nom</label>
                <input type="text" class="form-control" id="author" name="author" required>
              </div>
                <div class="form-group">
                <label for="comment">commentaire</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
      </article>
    </div>
  </div>  

<?php
$content = ob_get_clean();
?>

<?php
require('view/frontend/template.php');
?>
Download Formatting took: 116 