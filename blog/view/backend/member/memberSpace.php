<?php
ob_start();
?>

    <div class="container">

        <ol class="breadcrumb">
            <li><a href="index.php">Accueil</a></li>
            <li class="active"><a href="index.php?action=listPosts">Blog</a></li>
            <li class="active">Espace Membre</li>
        </ol>

        <div class="row">

            <!-- Article main content -->
            <article class="col-md-12 maincontent">

                <header class="page-header">
                    <h1 class="page-title">Liste des articles</h1>
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
                        while ($data = $posts->fetch()) {
                            ?>
                            <tr>
                                <th><?= $data['id']; ?></th>
                                <td><?= $data['title']; ?></td>
                                <td><?= $data['creation_date_fr']; ?></td>
                                <td><?php
                                    if ($data['update_date_fr'] === null) {
                                        echo "pas encore de maj";
                                    } else {
                                        echo $data['update_date_fr'];
                                    }
                                    ?></td>
                                <td><a class="btn btn-warning" href="index.php?action=memberEditPost&amp;id=<?= $data['id'] ?>">Éditer</a></td>
                                <td>
                                    <a href="index.php?action=memberDeletePost&amp;id=<?= $data['id'] ?>" class="btn btn-danger">Supprimer</a>
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
        echo ' <a href="index.php?action=signIn&amp;page=' . $i . '">' . $i . '</a> ';
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