<?php
	// echo "Method:" .$_SERVER['REQUEST_METHOD']."<br>";
	//print_r($_POST['login']); 
	
	// if($_SERVER['REQUEST_METHOD'] == 'POST') {
	// 	echo "Post<br>";
	// 	if(isset($_POST['login'])) {
	// 		echo 'yes: ', $_POST['login'];
	// 	} else {
	// 		echo 'no';
	// 	}
	// }
	session_start();
	if (!isset($_SESSION['logedIn']) || $_SESSION['logedIn'] != true){ // För att sätta ett värde till session-index(logedIn) om ej satt
		$_SESSION['logedIn'] = false;
	} elseif (isset($_SESSION['logedIn']) || $_SESSION['logedIn'] == true) { // Kollar om användaren är inlogged eller ej
		if (isset($_POST['logout'])){  // När användare är utloggad
			//$userName = 'Användaren "' . $_POST['userName'] . '" är nu utloggad!';
			//$_SESSION['viewInfo'] = true;
			session_destroy(); 
			header("Location: ../../index.php");
			exit();
			//echo "När användare är utloggad" .$_SESSION['logedIn'];
		} else  { // Inloggad användare
			header("Location: ../../index.php");
			exit();
			//echo "Inloggad användare: " . $_SESSION['logedIn'];
		}
	} 
	// include 'includes/show_errors.php'; // inkludera vid utveckling för att få feedback på eventuella fel i koden
	include 'includes/handel_login.php'; // funktion för att hantera login
	include 'includes/handel_newUser.php'; // funktion för att hantera ny anvävdare
	require_once('../db.php');

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
	<link rel="stylesheet" href="../../css/style.css">
	</head>
	<body>
		<header>
			<div class="nav-link-to-start-page">
				<div class="button-link">
					<span class="material-symbols-outlined double-arrow">
						double_arrow
					</span> 
					<a href="../../index.php">Startsidan</a> 
				</div>
			</div>
		</header>
		<main>
			<div class="login-container">
				
				<form action="login.php" method="post" class="login-form" id="userLogin" >
					<h1>Logga in till Bloggen</h1>
					<span id="loginMessage" class="errorMessage"></span>
					<p>Logga in</p>
					<div class="form-container">
						<div>
							<input type="text" name="logInNamn" id="logInNamn" placeholder="Skriv in ditt namn här">
							<span id="nameError" class="errorMessage"></span>
						</div>
						<div>
							<input type="password" name="logInPassword" id="logInPassword" placeholder="Skriv in ditt lösenord här">
							<span id="passwordError" class="errorMessage"></span>
						</div>
						<div>
							<input class="button-login" type="submit" value="Logga in" name="login" id="submit-login">
						</div>
					</div>
					<p>Spara ny användare</p>
					<div class="form-container">
						<div>
							<input type="text" id="saveNewUserNamn" name="saveNewUserNamn" placeholder="Skriv in nytt namn här">
							<span id="newUserNamnError" class="errorMessage"></span>
						</div>
						<div>
							<input type="password" id="saveNewUserPassword" name="saveNewUserPassword" placeholder="Skriv in nytt lösenord här">
							<span id="newUserPasswordError" class="errorMessage"></span>
						</div>
						<div>
							<input class="button-login" type="submit" value="Spara" name="saveNewUser" id="save-new-user">
						</div>
					</div> 
				</form>
			</div>
			
		</main>
		<footer>
			<?php require_once '../../layout/footer.php'; ?>
		</footer>
		 <script src="../../javascript/script.js"></script>
	</body>
</html>