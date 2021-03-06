<?php
ob_start();
?>

    <!-- container -->
    <div class="container">

        <ol class="breadcrumb">
            <li><a href="index.php">Accueil</a></li>
            <li class="active">Inscription</li>
        </ol>

        <div class="row">

            <!-- Article main content -->
            <article class="col-xs-12 maincontent">
                <header class="page-header">
                    <h1 class="page-title">Inscription</h1>
                </header>
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="thin text-center">Créer votre compte</h3>
                            <p class="text-center text-muted">Si vous avez déjà un compte, merci de vous <a href="member.php?action=signIn">Connecter </a>  </p>
                            <hr>
                            <form method="post">
                                <?php
                                if (isset($message)) {
                                    ?>
                                    <div class="alert alert-info">
                                        <?= $message; ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="top-margin">
                                    <label>Pseudo <span class="text-danger">*</span></label>
                                    <input type="text" name="pseudo" class="form-control" required>
                                </div>
                                <div class="top-margin">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="text" name="email" class="form-control" required>
                                </div>
                                <div class="row top-margin">
                                    <div class="col-sm-6">
                                        <label>Mot de passe <span class="text-danger">*</span></label>
                                        <input type="password" name="pass" class="form-control" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Confirmer votre mot de passe <span class="text-danger">*</span></label>
                                        <input type="password" name="verif_pass" class="form-control" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-8">

                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <button class="btn btn-action" name="inscription" type="submit">S'inscrire</button>
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