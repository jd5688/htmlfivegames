<?php
include 'dbcon.php';

$tables = array();
$id = (isset($_GET['id'])) ? $_GET['id'] : '';

$q = "SELECT * FROM csv_table_fields";
$res = mysql_query($q);
if (mysql_num_rows($res) > 0) {
	while ($row = mysql_fetch_array($res)) {
		$tables[] = $row;
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
	<form role="form" action="showrecords.php">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Choose Header</label>
	    <select class="form-control" name="id">
	    	<option value=""></option>
	    <?php
	    foreach ($tables as $t) {
	    	$tname = $t['id'];
	    ?>	
	    	<option value="<?php echo $tname?>"><?php echo $t['fields'];?></option>
	    <?php
	    } // foreach
	    ?>
	    </select>
	  </div>
	  
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="http://hayageek.github.io/jQuery-Upload-File/jquery.uploadfile.min.js"></script>
</body>
</html>