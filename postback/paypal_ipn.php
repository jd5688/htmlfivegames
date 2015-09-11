<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require_once('classes/class.paypal_ipn.php');

$PL = new PaypalIpn();

// default values
//$PL->DEBUG = 1;
//$PL->USE_SANDBOX = 1;
//$->LOG_FILE = "./ipn.log";
$PL->processInput(file_get_contents('php://input'));

if ($PL->isValidated()) {
	// check whether the payment_status is Completed
	// check that txn_id has not been previously processed
	// check that receiver_email is your PayPal email
	// check that payment_amount/payment_currency are correct
	// process payment and mark item as paid.

	// assign posted variables to local variables
	//$item_name = $_POST['item_name'];
	//$item_number = $_POST['item_number'];
	//$payment_status = $_POST['payment_status'];
	//$payment_amount = $_POST['mc_gross'];
	//$payment_currency = $_POST['mc_currency'];
	//$txn_id = $_POST['txn_id'];
	//$receiver_email = $_POST['receiver_email'];
	//$payer_email = $_POST['payer_email'];
}
?>