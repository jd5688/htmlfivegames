<?php
include 'dbcon.php';

$header = array();
$is_where = '';
$kw = (isset($_GET['keyword'])) ? $_GET['keyword'] : '';
$id = (isset($_GET['id'])) ? $_GET['id'] : '';

if (!$id OR !$kw) {
	header('Location: index.php');
	exit;
}

$q = "SELECT * FROM csv_table_fields WHERE id = '$id' LIMIT 0,1";
$res = mysql_query($q);
if (mysql_num_rows($res) > 0) {
	$row = mysql_fetch_array($res);
	$header = explode(",", $row['fields']);
};

$dbtbl = 'csv_' . $id;

if ($header) {
	foreach ($header as $h) {
		$is_where .= "$h like '%$kw%' OR "; 
	}
	$is_where = substr($is_where, 0, -3);
}

$q = "SELECT * FROM $dbtbl WHERE $is_where";
$res = mysql_query($q);
if (mysql_num_rows($res) > 0) {
	while ($row = mysql_fetch_array($res)) {
		$data[] = $row;
	}
};
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
	<form role="form" action="search.php">
	  <div class="form-group">
	    Search: <input type="text" name="keyword" placeholder="Type keyword"/> <button type="submit" class="btn btn-default">Search</button> <a class="btn btn-success" href="addnew.php?id=<?php echo $id?>">Add New</a> <a class="btn btn-success" href="viewcsv.php">Choose another CSV</a>
	  </div>
	  <input type="hidden" name="id" value="<?php echo $id?>">
	</form>
	<hr>

	<?php
	if ($data AND $header) {
	?>
		<table class="table table-striped">
			<tr>
		<?php
			foreach ($header as $h) {
		?>
				<td><?php echo ucfirst($h)?></td>
		<?php
			} // foreach
		?>
			</tr>
	<?php
		foreach ($data as $d) {
			echo '<tr>';
			foreach ($header as $key => $val) {
	?>
				<td><?php echo $d[$val]?></td>
	<?php
			} // foreach
			echo '</tr>';
		} // foreach
	?>
		</table>
	<?php
	} // if $data
	?>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="http://hayageek.github.io/jQuery-Upload-File/jquery.uploadfile.min.js"></script>
</body>
</html>