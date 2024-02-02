<?php
  	$stringtext = "Denna text är genererad med utskriftskommandot i PHP.";
	$strName = "";
	$ifSubmit = false;
	if (isset($_GET['submit'])){ 
		if ($_GET['namn']){
			$strName = "Namn: Hej " . $_GET['namn'];
			$backWords = "Baklänges: " . strrev($_GET['namn']);
			$lowerCase = "Gemener: ". strtolower($_GET['namn']);
			$UpperCase= "Versaler: ". strtoupper($_GET['namn']);
			$strlength= "Antal tecken: ". strlen($_GET['namn']);
		} elseif ($_GET['namn'] == ""){
			$strName = "Namn: Hej Dag Fredriksson";
			$backWords = "Baklänges: " . strrev(substr($strName, 10));
			$lowerCase = "Gemener: ". strtolower(substr($strName, 10));
			$UpperCase= "Versaler: ". strtoupper(substr($strName, 10));
			$strlength= "Antal tecken: ". strlen(substr($strName, 10));
		}
		$ifSubmit = true;
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
		<h1>Labb 1a - PHP-sidor</h1>
		<a href="../index.php">Länksida</a>
	</div>
	<main>
		<div class="grid col-1">
			<h2>Allmänt</h2>
			<p>Här kommer det första Labbet, PHP-sida 1</p>
			<p>
				Den innehåller HTML-sida med en inlänkad css-fil (style.css) för att
				styla sidans markup.
			</p>
				Sidan utforskar Strängar. Texeter kommer via ett formulär, sparas och tas hand om 
				för att sedan skrivs ut på ett skojsigt sätt :-)
			</p>
			<p>
				Sidan inkluderar även ett footer-element med matnyttig information.
			</p>
			<h2>Strängar</h2>
			<p><?php echo $stringtext; ?></p>
			<form action="sida1.php" method="get">
				<input type="text" name="namn" id="namn" placeholder="Skriv in ditt namn här">
				<input type="submit" value="Skicka namnet" name="submit">
				
			</form>
		</div>
		<div class="grid col-2">
			<h2>Resultat:</h2>
			<!-- <p>
				<span class="answer">Svar på fråga a:</span><br>
				<?php echo $strName; ?>
			</p>
			<p>
				<span class="answer">Svar på fråga b:</span><br>
				<?php echo $backWords; ?>
			</p>
			<p>
				<span class="answer">Svar på fråga c:</span><br>
				<?php echo $lowerCase;?>
			</p>
			<p>
				<span class="answer">Svar på fråga d:</span><br>
				<?php echo $UpperCase; ?>
			</p>
			<p>
				<span class="answer">Svar på fråga e:</span><br>
				<?php echo $strlength; ?>
			</p> -->
			<?php
			if($ifSubmit == true) {
			?>
			<ol type="a">
				<li>
					<p>
						Sparar namnet från formuläret i en variabel strName, 
						finns inget namn skickat från formuläret används istället ditt namn.
					</p>
					<?php
						echo "<p> <span class=\"answer\">Svar på fråga a:</span><br>";
						echo "strName variabel skapad se källkoden";
					?>
				</li>
				<li>
					<p>
						Skriver ut ”Hej” följt av värdet på strName.
					</p>
					<?php
						echo "<p> <span class=\"answer\">Svar på fråga b:</span><br>";
						echo $strName;
						echo "</p>";
					?>
				</li>
				<li>
					<p>
					På nästa rad skriver ut ”Baklänges: ” följt av strName baklänges.
					</p>
					<?php
						echo "<p><span class=\"answer\">Svar på fråga c:</span><br>";
						echo $backWords;
						echo "</p>";
					?>
				</li>
				<li>
					<p>
						På nästa rad skriver ut ”Gemener: ” följt av 
						strName med enbart små bokstäver.
					</p>
					<?php
						echo "<p><span class=\"answer\">Svar på fråga d:</span><br>";
						echo $lowerCase;
						echo "</p>";
					?>
				</li>
				<li>
					<p>
						På nästa rad skriver ut ”Versaler: ” följt av 
						strName med enbart stora bokstäver.
					</p>
					<?php
						echo "<p><span class=\"answer\">Svar på fråga e:</span><br>";
						echo $UpperCase; 
						echo "</p>";
					?>
				</li>
				<li>
					<p>
						På nästa rad skriver ut ”Antal tecken: ” 
						följt av längden på variabeln.
					</p>
					<?php
						echo "<p><span class=\"answer\">Svar på fråga f:</span><br>";
						echo $strlength;
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