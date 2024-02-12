<?php
	if (isset($_GET['reset'])){ 
		header("Location: sida4.php");
	}
	$ifSubmit = false;
  	if (isset($_GET['submit'])){ 
		if ($_GET['length'] != ""){
			$Length = $_GET['length'];
		} 
		if ($_GET['width'] != ""){
			$Width = $_GET['width'];
		} 
		$FormValuesCircumference = calculateCircumference ($Length, $Width);
		$FormValuesArea = calculateArea ($Length, $Width);
		$ifSubmit = true;
	}
	if (isset($_GET['submitTwo'])){ 
		if ($_GET['length'] != ""){
			$Length = $_GET['length'];
		} 
		if ($_GET['width'] != ""){
			$Width = $_GET['width'];
		} 
		$FormValuesCircumference = calculateCircumference ($Length, $Width);
		$FormValuesArea = calculateArea ($Length, $Width);
		$ifSubmit = true;
	}
	function calculateCircumference ($Length = 0, $Width = 0)
	{
		if ($Length == 0 || $Width == 0) {
			$retval = "Ett eller fler värden saknas!";
		} else {
			if (isset($_GET['submit'])){ 
				$retval = "Rektangelns omkrets är: " . $Length * 2 + $Width * 2;
			}
			elseif (isset($_GET['submitTwo'])) {
				$retval = "Rektangelns omkrets är: " . $Length * 2 + $Width * 2 . 
				" " . calculateArea ($Length, $Width);
			}
		}
		return $retval;
	}

	function calculateArea ($Length = 0, $Width = 0) {
		if ($Length == 0 || $Width == 0) {
			$retval = "Ett eller fler värden saknas!";
		} else {
			$retval = "Rektangelns area är: " . $Length * $Width;
		}
		return $retval;
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
			<h1>Labb 1a - PHP-sidor</h1>
		</div>
		<?php
			require_once 'menu.php';
		?>
		<main>
			<div class="grid col-1">
				<h2>Allmänt</h2>
				<p>Här kommer det första Labbet, PHP-sida 4</p>
				<p>
					Den innehåller en HTML-sida med en inlänkad css-fil &#40;style.css&#41; för att
					styla sidans markup.
				</p>
				<p>
					Sidan använder funktioner som anropas och används på lite olika sätt.
					funktionernas beräkningarna skrivs sedan ut på olika sätt eligt uppgiftens krav.
				</p>
				<p>
					Sidan inkluderar även ett footer-element med matnyttig information.
				</p>
				<h2>Funktioner</h2>
				<form action="sida4.php" method="get">
					<p>Räkna ut rektangelns omkrets: (bäst för fråga 1-8)</p>
					<input type="text" name="length" placeholder="Mata in längd">
					<input type="text" name="width" placeholder="Mata in bredd">
					<input type="submit" value="Beräkna" name="submit">
					<input type="submit" value="Återställa" name="reset">
				</form>
				<form action="sida4.php" method="get">
					<p>Räkna ut rektangelns omkrets och area: (bäst för fråga 9)</p>
					<input type="text" name="length" placeholder="Mata in längd">
					<input type="text" name="width" placeholder="Mata in bredd">
					<input type="submit" value="Beräkna" name="submitTwo">
					<input type="submit" value="Återställa" name="reset">
				</form>
			</div>
			<div class="grid col-2">
				<h2>Resultat:</h2>
				<?php
					if($ifSubmit == true) {
				?>
				<ol type="1">
					<li>
						<p>
							Skapa en funktion som heter calculateCircumference som beräknar 
							omkretsen av en rektangel och skriver ut omkretsen. 
							Funktionen ska ta emot två parametrar: length och width vilka 
							används för att beräkna omkretsen.
						</p>
						<?php
							echo "<p> <span class=\"answer\">Svar på fråga 4:</span><br>";
							echo "Omkretsen på en rektangel med en brädd på 6m och höjd på 4m
							\"calculateCircumference(6, 4)\" är = " . calculateCircumference(6, 4) . "m";
							echo "</p>";
						?>
					</li>
					<li>
						<p>
							Skapa ett formulär där användaren kan mata in värden för längd och bredd. 
						</p>
						<?php
							echo "<p> <span class=\"answer\">Svar på fråga 5:</span><br>";
							echo "Mata in värden i formuläret";
							echo "</p>";
						?>
					</li>
					<li>
						<p>
							När användaren trycker på en knapp med titeln "Beräkna" 
							så ska värden läsas från formuläret och funktionen 
							calculateCircumference anropas med längd och bredd som argument.
						</p>
						<?php
							echo "<p> <span class=\"answer\">Svar på fråga 6:</span><br>";
							echo $FormValuesCircumference;
							echo "</p>";
						?>
					</li>
					<li>
						<p>
						Skapa en funktion som heter calculateArea som beräknar arean av 
						en rektangel och returnerar arean. Funktionen ska ta emot två parametrar: 
						length och width vilka används för att beräkna arean.
						</p>
						<?php
							echo "<p> <span class=\"answer\">Svar på fråga 7:</span><br>";
							echo $FormValuesArea; 
							echo "</p>";
						?>
					</li>
					<li>
						<p>
							Anropa funktionen calculateArea inifrån funktionen calculateCircumference, 
							skicka in längd och bredd som argument till funktionen calculateArea.
						</p>
						<?php
							echo "<p> <span class=\"answer\">Svar på fråga 8:</span><br>";
							echo "Rektangelns area är anropas även i calculateCircumference funktionen";
							echo "</p>";
						?>
					</li>
					<li>
						<p>
							Modifiera funktionen calculateCircumference så att den skriver ut 
							omkrets och area när användaren trycker på knappen "Beräkna". 
							Ingen utskrift ska göras i funktionen calculateArea.
						</p>
						<?php
							echo "<p> <span class=\"answer\">Svar på fråga 9:</span><br>";
							echo $FormValuesCircumference;
							echo "</p>";
						?>
					</li>
				</ol>
				<?php
					}
				?>
			</div>
		</main>
		<?php
			require_once 'footer.php';
		?>
	</body>
</html>