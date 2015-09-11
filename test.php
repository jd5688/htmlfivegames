<?php
//ini_set('memory_limit', '2048M');
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
function countDays($dateInString) {
	$mo = substr($dateInString, 0, 2);
	$day = substr($dateInString, 3, 2);
	$yr = substr($dateInString, 6, 4);

	//if (checkdate($mo, $day, $yr)) {
		echo strtotime("$mo.$day.$yr");
	//}
}

countDays("01.15.2014");

?>