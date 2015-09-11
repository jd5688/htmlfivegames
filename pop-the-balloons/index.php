<?php
$description = "Pop the Balloons is a typing game. Pop by typing the word written on each balloon. If the balloon escapes, you will lose a life. The game gets difficult as you finish each level.";
$keywords = "balloon, pop, typing, game";
$author = "Rudem Labial";
$app_name = "Pop the Balloons";
$site_name = "htmlfivegames.org";
$author_pic = "u/0/+RudemLabial";
$game_image = "http://www.htmlfivegames.org/pop-the-balloons/images/gameimage.png";
$game_url = "http://www.htmlfivegames.org/pop-the-balloons/";
?>
<!DOCTYPE html>
<html>
	<?php include '../header.php';?>
	<link rel="stylesheet" type="text/css" href="style.css">
          <h2>Pop the Balloons</h2>
          <article id="main" role="main">
            <canvas id="mainCanvas" width="800" height="800"></canvas>
			<canvas id="canvasBalloon" width="800" height="800"></canvas>
		    <canvas id="canvasText" width="800" height="800"></canvas>
		    <canvas id="canvasTyped" width="800" height="800"></canvas>
		    <canvas id="canvasBar" width="800" height="800"></canvas> 
		    <canvas id="canvasStatus" width="800" height="800"></canvas>
          </article>
    <?php include '../footer.php';?>
    <script src="./js/createjs-2013.12.12.min.js"></script>
	<script src="./js/pop.min.js"></script>
</body>
</html>