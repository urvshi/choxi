<?php include_once("includes/init.php") ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Chdeckout Deals</title>

    <!-- Bootstrap -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.23/theme-default.min.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo SITE_BASE; ?>css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo SITE_BASE; ?>css/default.css">
  <link rel="stylesheet" type="text/css" href="<?php echo SITE_BASE; ?>css/colorbox.css">
  <link rel="stylesheet" href="http://www.elevateweb.co.uk/wp-content/themes/radial/jquery.fancybox.css" />
  <link href="<?php echo SITE_BASE; ?>lightbox/css/lightbox.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<?php include_once("user_nav.php"); ?>
	<div class="container" style="padding: 48px 0px;">
  </div>

  <nav>
    <div class="container">
      <ul>

  <?php
  $sql = "select * from category";
  $result_set = $dtb->query($sql);
  while( $result = $result_set->fetch_object()){
    echo '<li><a href="#">'.ucfirst($result->category).'</a></li>';
  }
  ?>  

    </div>
  </nav>

