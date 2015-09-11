<?php
include 'dbcon.php';
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
	<h1>CSV to DB</h1><br>
	<form role="form" enctype="multipart/form-data" action="" method="POST">
		<div class="form-group">
			<label for="csv-file">Select CSV file:</label>
    		<!--<input type="file" name="csv_file" placeholder="CSV File" required>-->
    		<div id="fileuploader"></div>
		</div><br>
		<?php /*
		<div class="form-group">
			<button type="submit" class="btn btn-default">Upload</button>
		</div>
		*/ ?>
	</form>
	<div id="success-cont" style="display:none">
		<p class="text-primary"><h3>Success! <small>The CSV file has been transferred to the database.</small></h3></p>
		<a id="redir" href="">Click here </a> to view the records.
	</div>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="http://hayageek.github.io/jQuery-Upload-File/jquery.uploadfile.min.js"></script>
</body>
</html>
<script>
$(document).ready(function()
{
	$("#fileuploader").uploadFile({
		url:"upload.php",
		fileName:"myfile",
		allowedTypes:"txt,csv,bak",
		onSuccess: function (files,data,xhr) {
			data = $.parseJSON(data);
			if (data.status === 'success') {
				$('a#redir').attr('href', 'viewcsv.php');
				$('#success-cont').show();
			} else {
				$('#success-cont').html(data.message);
				$('#success-cont').show();
			}
		}
	});
});
</script>