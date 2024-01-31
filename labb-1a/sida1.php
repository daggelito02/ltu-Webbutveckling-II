<?php
  	$stringtext = "Denna text är genererad med utskriftskommandot i PHP.";
	$strName = "";
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
			<p>
				<?php echo $strName; ?>
			</p>
			<p>
				<?php echo $backWords; ?>
			</p>
			<p>
				<?php echo $lowerCase;?>
			</p>
			<p>
				<?php echo $UpperCase; ?>
			</p>
			<p>
				<?php echo $strlength; ?>
			</p>
		</div>
	</main>
    <?php
        require_once 'footer.php';
    ?>
</body>