<?php
	session_start();
	if (!isset($_SESSION['logedIn']) || $_SESSION['logedIn'] != true){ // För att sätta ett värde till session-index(logedIn) om ej satt
		$_SESSION['logedIn'] = false;
	}
	if( isset( $_SESSION['userName'] ) ) { // Användare inloggad
		$userName = $_SESSION['userName'];
		$loggedInUser = 'Välkommen ' . $_SESSION['userName'];
		$userName = $_SESSION['userName'];
	 } 

	include 'includes/show_errors.php'; // inkludera vid utveckling för att få feedback på eventuella fel i koden
	require_once('admin/db.php');
?>
<!doctype html>
<html lang="sv">
	<head>
	<meta charset="utf-8">
	<title>Dag Fredriksson Luleå Universitet</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
	<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<header>
			<?php include_once 'layout/header.php'; ?>
		</header>
		<nav class="menu">
			<?php include_once 'layout/menu.php'; ?>
		</nav>
		<main>
			<?php include_once 'layout/content.php'; ?>
		</main>
		<aside class="info">
			<?php include_once 'layout/info.php'; ?>
		</aside>
		<footer>
			<?php include_once 'layout/footer.php'; ?>
		</footer>
	</body>
</html>