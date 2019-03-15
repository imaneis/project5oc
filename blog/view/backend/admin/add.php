<?php
ob_start();
?>

<div class="container">

    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="admin.php?action=logIn">espace admin</a></li>
      <li class="active">Ajouter un article</li>
    </ol>

    <div class="row">
      
      <!-- Article main content -->
      <article class="col-md-12 maincontent">

          <header class="page-header">
            <h1 class="page-title">Ajouter un article</h1>
        </header>
           <form method='post'>
            <div class="form-group">
            <label>Titre</label>
            <input class="form-control" name="title" type='text' required>
          </div>
            <div class="form-group">
            <label>contenu</label>
            <textarea name='content' cols='160' rows='5' required></textarea>
          </div>
            <div class="form-group">
            <input class="btn btn-success" name='submit' type='submit'>
          </div>
          </form>
      </article>
    </div>
  </div> 

<?php
$content = ob_get_clean();
?>

<?php
require('template.php');
?>