<?php
ob_start();
?>

<div class="container">

    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li class="active">blog</li>
    </ol>

    <div class="row">

      <article class="col-md-12 maincontent">

<?php
while ($data = $posts->fetch()) {
?>

<header class="page-header">
    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><h1 class="page-title"><?= htmlspecialchars($data['title']) ?></h1></a>
  <p><?php
    echo substr($data['content'], 12, 200);
?></p>
</header>
  
<?php
}
$posts->closeCursor();
?>

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
        echo ' <a href="index.php?action=listPosts&amp;page=' . $i . '">' . $i . '</a> ';
    }
}
echo '</p>';
?>

<?php
$content = ob_get_clean();
?>


<?php
require('view/frontend/template.php');
?>