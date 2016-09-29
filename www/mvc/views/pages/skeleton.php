<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>SensorsViz</title>

    <!-- BOOTSTRAP Core CSS -->
    <?php if(file_exists("dist/js/bootstrap.min.js")) { ?>
      <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <?php } else { ?>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <?php } ?>


    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <?php if(file_exists("assets/css/$page_include.css")) { ?>
      <link href="assets/css/<?= $page_include ?>.css" rel="stylesheet">
    <?php } ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SensorsViz</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?php if($include_page=="home"){ ?>class="active"<?php } ?>><a href="home">Home</a></li>
            <li <?php if($include_page=="circularheat"){ ?>class="active"<?php } ?>><a href="circularheat">Circular heat</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

<?php
  include_once('mvc/views/pages-parts/'.$include_page.'.php');
?>

    </div><!-- /.container -->

    <!-- JQUERY -->
<?php if(file_exists("dist/js/jquery.min.js")) { ?>
    <script src="dist/js/jquery.min.js"></script>
<?php } else { ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<?php } ?>
    <!-- BOOTSTRAP -->
<?php if(file_exists("dist/js/bootstrap.min.js")) { ?>
    <script src="dist/js/bootstrap.min.js"></script>
<?php } else { ?>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php } ?>
    <!-- SPECIFIC LIBRARIES -->
<?php foreach ($jsLibraries['dist'] as $value) { ?>
    <script src="assets/js/<?= $value ?>.js"></script>
<?php } ?>
<?php foreach ($jsLibraries['assets'] as $value) { ?>
    <script src="assets/js/<?= $value ?>.js"></script>
<?php } ?>
  </body>
</html>
