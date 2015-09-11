<?php
require_once("../../include/config.php");
require_once($basedir . "/admin/include/functions.php");
include $basedir . '/admin/include/isadmin.php';

$lang_list = getLanguages();
$datatables = '';
$gamemenu = '';
$settingsmenu='active';
$public_key = $config['public_key'];
$hash = md5($public_key . $config['private_key']);
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include $config['basedir'] . '/admin/include/header.php'; ?>
	</head>

	<body class="skin-blue">
	<!-- header logo: style can be found in header.less -->
	<header class="header">
		<?php include $config['basedir'] . '/admin/include/header_menu.php'; ?>
	</header><!-- ./header -->
	
	<div class="wrapper row-offcanvas row-offcanvas-left">

		<!-- Left side column. -->
		<aside class="left-side sidebar-offcanvas">                

			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<?php include $config['basedir'] . '/admin/include/sidebar.php'; ?>
			</section><!-- /.sidebar -->

		</aside><!-- /.left-side -->

		<!-- Right side column -->
		<aside class="right-side">

			<!-- Header Nav (breadcrumb) -->
			<section class="content-header">
				<h1><?php echo $lang[9] ?><small><?php echo $lang[41] ?></small></h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo $config['basedir']; ?>/"><i class="fa fa-dashboard"></i><?php echo $lang[27] ?></a></li>
					<li><a href="<?php echo $config['basedir']; ?>/admin/settings"><?php echo $lang[8] ?></a></li>
					<li class="active"><?php echo $lang[9] ?></li>
				</ol>
			</section><!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<?php include $config['basedir'] . '/admin/settings/settingsbody.php'; ?>
			</section><!-- /.content -->

		</aside><!-- /.right-side -->

	</div><!-- ./wrapper -->
	
	<?php include $config['basedir'] . '/include/javascript.php'; ?>
	
	</body>
</html>