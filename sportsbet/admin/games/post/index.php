<?php
session_start();
require_once("../../../include/config.php");
require_once($basedir . "/admin/include/functions.php");
include $basedir . '/admin/include/isadmin.php';

$cats = getCategories();
$gamemenu='active';
$location = $_SERVER['PHP_SELF'] . '?lang=' . $LANGUAGE;

if (isset($_SESSION['error'])) {
	$display = "block";
	$alert_message = $_SESSION['error']['status'];
	unset($_SESSION['error']);
} else {
	$display = "none";
	$alert_message = '';
}

?>
<!DOCTYPE html>
<html>
	<head>
		<?php include $basedir . '/admin/include/header.php'; ?>
	</head>

	<body class="skin-blue">
	<!-- header logo: style can be found in header.less -->
	<header class="header">
		<?php include $basedir . '/admin/include/header_menu.php'; ?>
	</header><!-- ./header -->
	
	<div class="wrapper row-offcanvas row-offcanvas-left">

		<!-- Left side column. -->
		<aside class="left-side sidebar-offcanvas">                

			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<?php include $basedir . '/admin/include/sidebar.php'; ?>
			</section><!-- /.sidebar -->

		</aside><!-- /.left-side -->

		<!-- Right side column -->
		<aside class="right-side">

			<!-- Header Nav (breadcrumb) -->
			<section class="content-header">
				<h1><?php echo $lang[20] ?><small><?php echo $lang[36] ?></small></h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo $baseurl ?>/"><i class="fa fa-dashboard"></i><?php echo $lang[27] ?></a></li>
					<li><a href="<?php echo $baseurl ?>/games"><?php echo $lang[18] ?></a></li>
					<li class="active"><?php echo $lang[20] ?></li>
				</ol>
			</section><!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<button name="choose-lang" id="jp-form" type="button" class="btn btn-info">JP</button> <button name="choose-lang" id="en-form" type="button" class="btn btn-default">EN</button>
				<?php include $basedir . '/admin/games/post/gamespostbody.php'; ?>
			</section><!-- /.content -->

		</aside><!-- /.right-side -->

	</div><!-- ./wrapper -->
	
	<?php include $basedir . '/include/javascript.php'; ?>
	
	</body>
</html>