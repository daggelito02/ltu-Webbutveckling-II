<?php
	session_start();
	if (!isset($_SESSION['logedIn']) || $_SESSION['logedIn'] != true){ // För att sätta ett värde till session-index(logedIn) om ej satt
		echo $_SESSION['logedIn'] = false;
	} elseif (isset($_SESSION['logedIn']) || $_SESSION['logedIn'] == true) { // Kollar om användaren är inlogged eller ej
		if (isset($_POST['logout'])){  // När användare är utloggad
			//$userName = 'Användaren "' . $_POST['userName'] . '" är nu utloggad!';
			//$_SESSION['viewInfo'] = true;
			session_destroy(); 
			header("Location: ../../index.php");
			//echo "När användare är utloggad" .$_SESSION['logedIn'];
		} else  { // Inloggad användare
			header("Location: ../../index.php");
			//echo "Inloggad användare: " . $_SESSION['logedIn'];
		}
	} 
	// include 'includes/show_errors.php'; // inkludera vid utveckling för att få feedback på eventuella fel i koden
	include 'includes/handel_login.php'; // funktion för att hantera login
	include 'includes/handel_newUser.php'; // funktion för att hantera ny anvävdare
	
	if (isset($_POST['login'])){ // Användare loggar in
		handelLogIn($_POST['logInNamn'], $_POST['logInPassword']);
	} elseif (isset($_POST['saveNewUser'])){ //Sparar nytt lösen till användare
		handelNewUser($_POST['saveNewUserNamn'], $_POST['saveNewUserPassword']);
	}
?>
<!doctype html>
<html lang="sv">
	<head>
	<meta charset="utf-8">
	<title>Dag Fredriksson Luleå Universitet</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
	<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<main>
			<?php
				if (isset($_SESSION['viewInfo'])) { // Visar info-ruta för användar-feedback vid login & nyanvändare
			?>
				<div class="info-box">
					<?php 
						echo $_SESSION['logInInfo'];
						if (isset($userName)) {
								echo '<p>';
								echo $userName;
								echo '</p>';
						}
						if ($_SESSION['logedIn']) {
							echo '<a class="button-link" href="../../index.php">&laquo; Tillbaka till startsidan </a>';
						}
						?>
					<!-- <form action="../../index.php" method="post">
						<div>
							<input type="submit" value="Tillbaka till startsidan" name="infoBox">
						</div>
					</form> -->
				</div>
			<?php
				}
			?>
			<div class="top-main-container">
				<h2>Logga in till mig </h2>
				<form action="login.php" method="post" class="login-form">
					<div>
						<p>Logga in</p>
						<input type="text" name="logInNamn" placeholder="Skriv in ditt namn här">
						<input type="password" name="logInPassword" placeholder="Skriv in ditt lösenord här">
						<input type="submit" value="Logga in" name="login">
					</div>
					<div>
						<p>Spara ny användare</p>
						<input type="text" name="saveNewUserNamn" placeholder="Skriv in nytt namn här">
						<input type="password" name="saveNewUserPassword" placeholder="Skriv in nytt lösenord här">
						<input type="submit" value="Spara" name="saveNewUser">
					</div> 
				</form>
			</div>
		</main>
		<?php
			require_once 'footer.php';
		?>
	</body>
</html>