<?php
ob_start();
?>

    <div class="container">

        <ol class="breadcrumb">
            <li><a href="index.php">Accueil</a></li>
            <li class="active"><a href="index.php?action=listPosts">Blog</a></li>
            <li class="active">Espace Admin</li>
        </ol>

        <div class="row">

            <!-- Article main content -->
            <article class="col-md-12 maincontent">

                <header class="page-header">
                    <h1 class="page-title">Liste des commentaires</h1>
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
                        while ($data = $comments->fetch()) {
                            ?>
                            <tr>
                                <th><?= $data['post_id']; ?></th>
                                <td><?= $data['author']; ?></td>
                                <td><?= $data['comment']; ?></td>
                                <td><?= $data['comment_date_fr']; ?></td>
                                <td><a href="index.php?action=approveComment&amp;id=<?= $data['id'] ?>" class="btn btn-success">Approuver</a></td>
                                <td>
                                    <a href="index.php?action=deleteComment&amp;id=<?= $data['id'] ?>" class="btn btn-danger">Supprimer</a>
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
        echo ' <a href="index.php?action=showComments&amp;page=' . $i . '">' . $i . '</a> ';
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