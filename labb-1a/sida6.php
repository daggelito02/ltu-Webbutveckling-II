<?php
  	if (isset($_GET['submit'])){ 
		if ($_GET['namn'] != ""){
			$nameGetMethod  = $_GET['namn'];
		} else {
			$nameGetMethod  = "Inget värde skickades";
		}
		if ($_GET['phonenumber'] != ""){
			$phoneNumberGetMethod  = $_GET['phonenumber'];
		} else {
			$phoneNumberGetMethod  = "Inget värde skickades";
		}
		$method = "get";
	}
	if (isset($_POST['submit'])){ 
		if ($_POST['namn'] != ""){
			$nameGetMethod  = $_POST['namn'];
		} else {
			$nameGetMethod  = "Inget värde skickades";
		}
		if ($_POST['phonenumber'] != ""){
			$phoneNumberGetMethod  = $_POST['phonenumber'];
		} else {
			$phoneNumberGetMethod  = "Inget värde skickades";
		}
		$method = "post";
	}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Dag Fredriksson Luleå Universitet</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="grid top-container">
		<h1>Labb 1a - PHP-sidor (PHP-sida 6)</h1>
		<a href="../index.php">Länksida</a>&nbsp;>>
	</div>
	<main>
		<div class="grid col-1">
			<h2>Sända och ta emot data</h2>
			<div class="result-send-data">
				<p class="answer">
					Resultat från sida6.html med metoden "<?php echo $method ?>".
				</p>
				<p>
					Namnet är: <?php echo $nameGetMethod?> <br>
					Telefonnummret är: <?php echo $phoneNumberGetMethod?>
				</p>
				<p>
					<a href="sida6.html">Tillbaka till formuläret (sida6.html)</a> >>
				</p>
			</div>
			<h2>Uppgifterna för denna sida "Sända och ta emot data"</h2>
			<ul>
				<li>
					4. I sida6.html: Skapa ett formulär där användaren kan mata in sitt 
					namn och telefonnummer. Attributet method skall ha värdet "get". 
					En knapp behövs som skickar iväg informationen 
					från formuläret till sida6.php.
				</li>
				<li>
					5. I sida6.php: ta emot värdena från sida6.html. 
					De värden användaren matade in i formuläret skall 
					skrivas ut på skärmen.
				</li>
				<li>
					7. I sida6.html: Skapa ett till formulär, detta nya formulär ska ha enda
				 	skillnaden att attributet method ska vara "post" istället för "get". 
				 	Notera att du nu har två olika formulär med varsin knapp, 
					man kan bara skicka ett formulär i taget. 
				</li>
				<li>
					8. I sida6.php: komplettera PHP-sidan så att den klarar 
					att ta emot värdena från båda formulären, get- eller 
					post-formuläret (inte från båda formulären samtidigt).
				</li>
			</ul>
		</div>
	</main>
    <?php
        require_once 'footer.php';
    ?>
</body>