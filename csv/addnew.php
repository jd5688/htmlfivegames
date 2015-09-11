<?php
include 'dbcon.php';

$header = array();
$id = (isset($_GET['id'])) ? $_GET['id'] : '';

if (!$id) {
	header('Location: index.php');
	exit;
}

$q = "SELECT * FROM csv_table_fields WHERE id = '$id' LIMIT 0,1";
$res = mysql_query($q);
if (mysql_num_rows($res) > 0) {
	$row = mysql_fetch_array($res);
	$header = explode(",", $row['fields']);
};

if (!$header) {
	header('Location: showrecords.php?id=' . $id);
	exit;
}

if (isset($_POST['submit'])) {
	$fields = '';
	$values = '';
	foreach ($_POST as $key => $val) {
		if ($key != 'submit') {
			$fields .= "$key,";
			$values .= "'$val',";
		}
	}

	$fields = "(" . substr($fields, 0, -1) . ")";
	$values = "(" . substr($values, 0, -1) . ")";

	$dbtbl = 'csv_' . $id;
	$q = "INSERT INTO $dbtbl $fields VALUES $values";
	mysql_query($q);

	header('Location: showrecords.php?id=' . $id);
	exit;
}
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
  <link href="http://hayageek.github.io/jQuery-Upload-File/uploadfile.min.css" rel="stylesheet">
</head>

<body>
	<div class="container">
	<h1>Add New Record</h1>
	<a class="btn btn-success" href="showrecords.php?id=<?php echo $id?>">Show records</a> <a class="btn btn-success" href="viewcsv.php">Choose another CSV</a>
	<hr>
	<form role="form" method="post">
	<?php
	foreach ($header as $h) {
	?>
		<div class="form-group">
	    	<label><?php echo ucfirst($h)?>:</label>
	    	<input type="text" class="form-control" name="<?php echo $h?>" required>
	  	</div>
	<?php 
	} // foreach
	?>
	  <button type="submit" name="submit" class="btn btn-default">Submit</button>
	</form>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="http://hayageek.github.io/jQuery-Upload-File/jquery.uploadfile.min.js"></script>
</body>
</html>