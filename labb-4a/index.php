<?php
	// session_start();
	// if($_SESSION['logedIn'] != true) { // Användare utloggad och behöver logga in igen
	// 	header("Location: login.php");
	// }
	// if( isset( $_SESSION['userName'] ) ) { // Användare inloggad
	// 	$loggedInUser = 'Välkommen ' . $_SESSION['userName'];
	// 	$userName = $_SESSION['userName'];
	//  }
	include 'includes/show_errors.php'; // inkludera vid utveckling för att få feedback på eventuella fel i koden
	require_once('admin/db.php');
?>
<!doctype html>
<html lang="sv">
	<head>
	<meta charset="utf-8">
	<title>Dag Fredriksson Luleå Universitet</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<header>
			<?php require_once 'layout/header.php'; ?>
		</header>
		<nav>
			<?php require_once 'layout/menu.php'; ?>
		</nav>
		<main>
			<?php require_once 'layout/content.php'; ?>
		</main>
		<aside>
			<?php require_once 'layout/info.php'; ?>
		</aside>
		<footer>
			<?php require_once 'layout/footer.php'; ?>
		</footer>
	</body>
</html>