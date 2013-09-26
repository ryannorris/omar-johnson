<?php
/***
* File: index.php
***/
require_once('oop/class.game.php');
require_once('oop/class.tictactoe.php');

//this will store their information as they refresh the page
session_start();

//if they haven't started a game yet let's load one
if (!$_SESSION['game']['tictactoe'])
	$_SESSION['game']['tictactoe'] = new tictactoe();
	

?>
<html>
	<head>
		<title>Tic Tac Toe</title>
		<link rel="stylesheet" type="text/css" href="inc/style.css" />
	</head>
	<body>
		<div id="content">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<h2>Hello Tic-Tac-Toe!</h2>
        Name: <input type="text" value="<?php echo $_POST['username']?>" name="username"><br>
		Game: <input type="text" value="<?php echo $_POST['gameN']?>" name="gameN">
		<?php
			if (!$_POST['username'] && !$_POST['gameN'])
				echo "<p align=\"center\"><input type=\"submit\" name=\"newgame\" value=\"New Game\" /></p>";
			else
				$_SESSION['game']['tictactoe']->playGame($_POST);
		?>
		</form>
		</div>
	</body>
</html>