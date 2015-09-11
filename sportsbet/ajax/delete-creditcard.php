<?php
session_start();

if (!$_SESSION['user_id']) { exit; }

require_once("../include/config.php");
require_once($basedir . "/include/user_functions.php");

$private_key = $config['private_key'];

$hash = (isset($_POST['hash'])) ? $_POST['hash'] : 0;
$public_key = (isset($_POST['public'])) ? $_POST['public'] : 0;
$time = (isset($_POST['t'])) ? $_POST['t'] : 0;


$myhash = md5($public_key . $private_key . $time);

if ($hash != $myhash) {
	echo json_encode(array('error' => '1', 'status' => $lang[215]));
	exit;
}

$bool = false;
$cc_id = (isset($_POST['cc_id'])) ? $_POST['cc_id'] : '';
$bill_id = (isset($_POST['bill_id'])) ? $_POST['bill_id'] : '';

$bool = deleteCreditCard($cc_id, $bill_id);
if ($bool) {
	echo json_encode(array('error' => '0', 'status' => 'success'));
	exit;
}
?>