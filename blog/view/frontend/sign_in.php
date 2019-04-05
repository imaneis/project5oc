<?php
ob_start();
?>

    <!-- container -->
    <div class="container">

        <ol class="breadcrumb">
            <li><a href="index.php">Accueil</a></li>
            <li class="active">Accès Membre</li>
        </ol>

        <div class="row">

            <!-- Article main content -->
            <article class="col-xs-12 maincontent">
                <header class="page-header">
                    <h1 class="page-title">Connexion</h1>
                </header>
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="thin text-center">Bienvenue,entrer vos identifiants</h3>
                            <p class="text-center text-muted"> Si vous n’avez pas de compte, merci de vous <a href="signup.html">inscrire</a> </p>
                            <hr>
                            <form method="post">
                                <?php
                                if (isset($error)) {
                                    ?>
                                    <div class="alert alert-danger">
                                        <?= $error; ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="top-margin">
                                    <label>Pseudo/Email <span class="text-danger">*</span></label>
                                    <input type="text" name="pseudo_or_email" class="form-control" required>
                                </div>
                                <div class="top-margin">
                                    <label>Mot de passe <span class="text-danger">*</span></label>
                                    <input type="password" name="pass" class="form-control" required>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-8">

                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <button class="btn btn-action" name="signIn" type="submit">Connexion</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>

<?php
$content = ob_get_clean();
?>

<?php
require('view/frontend/template.php');
?>