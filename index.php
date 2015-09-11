<?php
require('include/config.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>HTML5 Games - htmlfivegames.org</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASEURL?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASEURL?>bootstrap/css/cover.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <a href="<?php echo BASEURL?>"><img src="<?php echo BASEURL?>images/logo.png" /></a>
              <ul class="nav masthead-nav">
                <?php /* <li class="active"><a href="<?php echo BASEURL?>">Home</a></li> */ ?>
                <?php /* <li><a href="#">Contact</a></li> */ ?>
              </ul>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-4">
                <a href="<?php echo BASEURL?>pop-the-balloons"><img src="<?php echo BASEURL?>images/games-thumbs/pop-the-balloons.png" width="200" height="200" alt="Pop the Balloons" class="img-thumbnail"></a>
                <div class="caption">
                  <h3><a href="<?php echo BASEURL?>pop-the-balloons"><span class="text-primary">Pop the Balloons</span></a></h3>
                  <p>Test your typing skill by popping all the balloons. You pop the balloons by typing the word written on each one of them.</p>
                </div>
            </div>
          </div>

          <?php include 'views/footer.php'; ?>