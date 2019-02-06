<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport"    content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
  
  <title>Mon site pro</title>

  <link rel="shortcut icon" href="public/assets/images/gt_favicon.png">
  
  <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
  <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/assets/css/font-awesome.min.css">

  <!-- Custom styles for our template -->
  <link rel="stylesheet" href="public/assets/css/bootstrap-theme.css" media="screen" >
  <link rel="stylesheet" href="public/assets/css/main.css">

</head>

<body>
  <!-- Fixed navbar -->
  <div class="navbar navbar-inverse navbar-fixed-top headroom" >
    <div class="container">
      <div class="navbar-header">
        <!-- Button for smallest screens -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="index.php"><img src="public/assets/images/logo.png" alt="Progressus HTML5 template"></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav pull-right">
          <li><a href="index.php">Accueil</a></li>
          <li><a href="index.php?action=listPosts">BLOG</a></li>
          <li><a href="admin.php?action=adminSpace">Lists des articles</a></li>
          <li><a href="admin.php?action=comments">Lists des commentaires</a></li>
          <li><a href="admin.php?action=users">Lists des utilisateurs</a></li>
          <li><a class="btn" href="admin.php?action=addPost">Crée un article</a></li>
        </ul>
      </div>
    </div>
  </div> 
  <!-- /.navbar -->

  <header id="head" class="secondary"></header>

  <!-- container -->
    <?= $content ?>
   <!-- /container -->
  

  <footer id="footer" class="top-space">

    <!-- footer 1 div was removed -->

    <div class="footer2">
      <div class="container">
        <div class="row">
          
          <div class="col-md-6 widget">
            <div class="widget-body">
              <p class="follow-me-icons clearfix">
                <a href=""><i class="fa fa-twitter fa-2"></i></a>
                <a href=""><i class="fa fa-dribbble fa-2"></i></a>
                <a href=""><i class="fa fa-github fa-2"></i></a>
                <a href=""><i class="fa fa-facebook fa-2"></i></a>
              </p>  
            </div>
          </div>

          <div class="col-md-6 widget">
            <div class="widget-body">
              <p class="text-right">
                Copyright &copy; 2018,Issany Imane
              </p>
            </div>
          </div>

        </div> <!-- /row of widgets -->
      </div>
    </div>
  </footer> 
    

  <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="public/assets/js/headroom.min.js"></script>
  <script src="public/assets/js/jQuery.headroom.min.js"></script>
  <script src="public/assets/js/template.js"></script>
</body>
</html>