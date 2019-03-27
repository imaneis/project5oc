<?php
ob_start();
?>

<div class="container">

    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="index.php?action=logIn">espace admin</a></li>
      <li class="active">mettre a jour l'article</li>
    </ol>

    <div class="row">
      
      <!-- Article main content -->
      <article class="col-md-12 maincontent">

          <header class="page-header">
            <h1 class="page-title">mettre a jour l'article</h1>
        </header>
           <form method='post'>
          <input type='hidden' name='id' value='<?php
echo $post['id'];
?>'>
            <div class="form-group">
            <label>Titre</label>
            <?= '<input type="text" class="form-control" name="title" value="' . $post['title'] . '" required>'; ?>
         </div>
            <div class="form-group">
            <label>contenu</label>
            <textarea name='content' cols='160' rows='5' required><?php
echo $post['content'];
?></textarea>
          </div>
            <div class="form-group">
            <input class="btn btn-success" name='a_edit' type='submit'>
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