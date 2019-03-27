<?php
ob_start();
?>

<!-- container -->
    <div class="container">

        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Accès Admin</li>
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
                            <h3 class="thin text-center">Connexion Admin</h3>
                            <hr>
                            <?php
if(isset($error))
{
?>
<div class="alert alert-danger">
   <?= $error; ?> 
</div>
<?php
}
?> 
                            
                            <form method="post">
                                <div class="top-margin">
                                    <label>Pseudo/Email <span class="text-danger">*</span></label>
                                    <input type="text" name="name_or_email" required class="form-control">
                                </div>
                                <div class="top-margin">
                                    <label>Mot de passe <span class="text-danger">*</span></label>
                                    <input type="password" name="password" required class="form-control">
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-lg-8">
                                        
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <button class="btn btn-action" type="submit" name="logIn">Connexion</button>
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