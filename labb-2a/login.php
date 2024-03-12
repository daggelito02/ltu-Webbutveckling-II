<?php
	session_start();
	if (!isset($_SESSION['logedIn']) || $_SESSION['logedIn'] != true){ // För att sätta ett värde till session-index(logedIn) om ej satt
		$_SESSION['logedIn'] = false;
	} elseif (isset($_SESSION['logedIn']) || $_SESSION['logedIn'] == true) { // Kollar om användaren är inlogged eller ej
		if (isset($_POST['logout'])){  // När användare är utloggad
			$userName = 'Användaren "' . $_POST['userName'] . '" är nu utloggad!';
			$_SESSION['viewInfo'] = true;
			session_destroy(); 
		} else  { // Inloggad användare
			header("Location: index.php");
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
		<div class="top-container">
			<a href="../index.php">&laquo; Länksida</a>
			<h1>Labb 2 - PHP-sidor</h1>
		</div>
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
						?>
					<form action="login.php" method="post">
						<div>
							<input type="submit" value="Stäng" name="infoBox">
						</div>
					</form>
				</div>
				<div class="backdrop"></div>
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
			<div class="col-1">
				<h2>Koduppgift</h2>
				<p>
					Webbplatsen du ska skapa ska bestå av 
					<strong>två sidor</strong>, en inloggningssida som ska heta <strong>login.php</strong>
					och en "du är inloggad"-sida som ska heta <strong>index.php</strong>.
				</p>
				<p>
					Sidan login.php ska innehålla ett formulär för inloggning/registrering. 
					Användaren matar in ett användarnamn och ett lösenord och klickar på "Logga in" eller 
					"Spara ny användare". Använd ett lösenordsfält så att lösenordet blir dolt vid inmatning. 
				</p>
				<div>
					<img src="images/password.png" alt="Login picture" width="269" height="43">
				</div>
				<p>
					Knappen "Logga in" kontrollerar om användarnamn och lösenord matchar ett tidigare sparat 
					användarnamn och lösenord. Om det matchar så skickas användaren till <strong>index.php</strong>. 
				</p>
				<p>
					Ingen skillnad på&nbsp;stora och små bokstäver görs i användarnamnet, 
					det gör det däremot i lösenordet där det alltså ska göras skillnad mellan 
					versaler och gemener. Matchar inte användarnamn och lösenord ska användaren 
					upplysas om detta och uppmanas att försöka igen.
				</p>
				<p>
					Knappen "<em>Spara ny användare</em>" innebär att användarnamnet och lösenordet 
					sparas tillsammans i en textfil,&nbsp;men bara&nbsp;om användarnamnet 
					<strong>inte </strong>finns sparat i textfilen sedan tidigare.&nbsp;
				</p>
				<p>
					Sessioner ska användas för att hålla reda på om en specifik användare är inloggad 
					eller inte, en besökare som inte är inloggad ska skickas till sidan 
					<strong>login.php</strong> utan att se innehållet på sidan 
					<strong>index.php</strong>.</p>
				<p>
					Vid rätt användarnamn och lösenord ska en ”Du är inloggad”-sida visas, detta är alltså sidan 
					<strong>index.php</strong>. 
					Det som ska skrivas ut är texten "Du är inloggad" (eller liknande) samt så ska 
					även användarnamnet på den inloggade användaren skrivas ut. Det ska dessutom 
					finnas en möjlighet för användaren att logga ut. 
					<em>
						<strong>
							Notera att användarnamn och lösenord inte får synas i URL:en!
						</strong>
					</em>
				</p>
				<p>Lämpliga felmeddelande ska ges vid:</p>
				<ul>
					<li>Felaktigt användarnamn och/eller felaktigt lösenord</li>
					<li>Inget angett användarnamn</li>
					<li>Inget angett lösenord</li>
					<li>Användarnamnet finns redan (vid registrering av ny användare)</li>
				</ul>
				<p>
					Observera att man av säkerhetsskäl inte bör skriva ut information som avslöjar 
					att man hittat rätt användarnamn men felaktigt lösenord (eller tvärtom).
				</p>
			</div>
			<div class="col-2">
				<h2>Säkerhet</h2>
				<p>
					I denna uppgift ska användarnamn och lösenord alltså sparas till en textfil. 
					En bättre och säkrare lösning vore förstås att använda en databas men i denna 
					uppgift använder vi en vanlig text-fil för att öva att läsa och skriva till fil.
				</p>
				<p>
					<strong>OBS!</strong> 
					En textfil kan läsas av vem som helst som snubblar över filen så du ska vara medveten 
					om att man <strong>absolut inte</strong> lagrar användaruppgifter på detta sätt i 
					ett skarpt projekt, inte ens om man krypterar lösenordet.&nbsp;
				</p>
				<p>
					Lösenordet ska krypteras och saltas med hjälp av php-funktionen 
					<strong>password_hash</strong>, funktionen tar emot två parametrar: lösenordet 
					som ska krypteras och den algoritm som ska användas, i exempelt använder vi den 
					default algoritm som är implementerad i php samt lösenordet 'karameller'.
				</p>
				<pre>$hash = password_hash('karameller', PASSWORD_DEFAULT);</pre>
				<p>
					Det som returneras är&nbsp;det saltade och krypterade lösenordet. Det är denna 
					hash-sträng som är det som sparas i textfilen tillsammans med lösenordet istället 
					för att spara lösenordet i klartext i filen. Textfilen kan&nbsp;se ut&nbsp;något 
					liknande detta (användarnamn;hash-strängen):
				</p>
				<pre>fideli;$2y$10$X3R1GE/QNGriCSy.mac3ief/E7pJ7ZayfUxHwxwNRJ0.lfEyp.npK<br>agatha;$2y$10$CF8cW1vg1r/HEwbsHs8DEOXa/J9WVYmXJNMfo0Cn5G/iORoaACccm<br>janeway;$2y$10$tHOTLI6D8JB/ym.WQ7jNrOvKc2Q8hRtLu6svZIRJFe1Rs0Q4g7OJC<br>darthvader;$2y$10$cY8z5qHmuJJys4NE/9rWlO1JArAM.xVhpxMXZ3MQUKEYclFDg0lSi</pre>
				<p>
					Om någon kommer åt filen så kan de ändå inte, i alla fall inte omedelbart, veta 
					vilket lösenord som gömmer sig i strängen. Men vi måste ju kunna kontrollera ett 
					inmatat lösenord mot det lösenord som gömmer sig i hash-strängen. Detta görs med 
					php-funktionen&nbsp;<strong>password_verify</strong>, denna funktion tar emot två 
					parametrar, ett lösenord och en hash-sträng. Funktionen kontrollerar om lösenord 
					är det lösenord som gömmer sig i hash-strängen. Den returnerar true om lösenordet 
					stämmer eller false om lösenordet inte stämmer:
				</p>
				<pre>$isCorrectPassword = password_verify('karameller', $hash);</pre>
				<p>
					Läs mer i php manualen:&nbsp;
					<a href="http://php.net/manual/en/ref.password.php" class="external" target="_blank" rel="noreferrer noopener">
						<span>http://php.net/manual/en/ref.password.php</span>	
					</a>
					<span class="material-symbols-outlined">open_in_new</span>.
				</p>
			</div>
		</main>
		<?php
			require_once 'footer.php';
		?>
	</body>
</html>