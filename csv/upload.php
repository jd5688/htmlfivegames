<?php
//ini_set('display_errors', 1);
//error_reporting(~0);

include 'dbcon.php';
$target_path = "uploads/";
$move_on = false;

$target_path = $target_path . basename( $_FILES['myfile']['name']); 

if(move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) {
    $move_on = true;
}

$raw = file_get_contents($target_path);
$raw = str_replace("\r", "\n", $raw);
$raw = str_replace("\r\n", "\n", $raw);
$arr = explode("\n", $raw);

if (!$move_on) {
	$ret = array(
			'status' => 'error',
			'message' => 'There was an error processing the upload. Try again.'
		);

	echo json_encode($ret);
	exit;
}

/*
// for debugging
$raw = file_get_contents($target_path . 'Dev_Test_2.csv');
$raw = str_replace("\r", "\n", $raw);
$raw = str_replace("\r\n", "\n", $raw);
$arr = explode("\n", $raw);
*/

$this_id = false;
$fields = '';
$newfields = '';
$values = '';
for ($i = 0; $i < count($arr); $i++) {
	if ($i == 0) {
		$fields = $arr[$i];
		$header = explode(",", $fields);
		$num_head_fields = count($header);

		$q = "SELECT * FROM csv_table_fields";
		$result = mysql_query($q);
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_array($result)) {
				$ctr = 0;
				$id = $row['id'];
				$db_head = explode(",", $row['fields']);
				foreach ($db_head as $key => $val) {
					if (in_array($val, $header)) {
						$ctr++;
					}
				}

				if ($ctr == $num_head_fields) {
					$this_id = $id;
					break;
				}
			}
		}
	} else {
		$data = explode(",", $arr[$i]);
		if ($this_id) {
			$this_tbl = 'csv_' . $this_id;
		} else {
			// insert
			$q = "INSERT INTO csv_table_fields (fields) VALUES ('$fields')";
			mysql_query($q);
			$this_id = mysql_insert_id();
			$this_tbl = 'csv_' . $this_id;

			// create table
			foreach ($header as $head) {
				$newfields .= $head . " VARCHAR(255),";
			}
			$newfields .= " PRIMARY KEY ($fields)";
			//$newfields = substr($newfields, 0, -1);
			$sql="CREATE TABLE " . $this_tbl . " (" . $newfields . ")";
			mysql_query($sql);
		}

		$values = '';
		foreach ($data as $d) {
			$values .= "'" . $d . "',";
		}
		$values = substr($values, 0, -1);
		$values = "(" . $values . ")";
		$q = "INSERT IGNORE INTO " . $this_tbl . " ($fields) VALUES $values";
		mysql_query($q);
	}
}

$ret = array(
		'status' => 'success',
		'message' => $this_id
	);

echo json_encode($ret);
exit;
?>