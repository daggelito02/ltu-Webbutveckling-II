<?php
	session_start();
	if($_SESSION['logedIn'] != true) {
		header("Location: login.php");
	}
	if( isset( $_SESSION['userName'] ) ) {
		$loggedInUser = 'Välkommen ' . $_SESSION['userName'];
		$userName = $_SESSION['userName'];
	 }
?>
<!doctype html>
<html lang="sv">
	<head>
	<meta charset="utf-8">
	<title>Dag Fredriksson Luleå Universitet</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="top-container">
			<a href="../index.php">&laquo; Länksida</a>
			<h1>Labb 2 - PHP-sidor</h1>
		</div>
		<main>
			<div class="grid col-1">
				<h2>
					<?php 
						echo $loggedInUser;
					?>
				</h2>
				<p>Du är nu inloggad hos mig. Hoppas du mår toppen!</p>
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
				<p>Vill du vill logga ut? Använd "Logga ut" knappen nedan</p>
				<form action="login.php" method="post">
					<input type="hidden" name="userName" value="<?=$userName?>">
					<input type="submit" value="Logga ut" name="logout">
				</form>
			
			</div>
			<div class="grid col-2">
				Col 2
			</div> 
		</main>
		<?php
			require_once 'footer.php';
		?>
	</body>
</html>