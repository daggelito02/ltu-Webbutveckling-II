
<?php
  	$stringtext = "Mata ut tre olika soters djur i fälten nedan och låt PHP <br>
	utföra lite beräkningar genom att klicka på skicka knappen";
	$strName = "";
	if ($_GET['submit']){ 
		if ($_GET['namn']){
			$strName = "Namn: Hej " . $_GET['namn'];
			$backWords = "Baklänges: " . strrev($_GET['namn']);
			$lowerCase = "Gemener: ". strtolower($_GET['namn']);
			$UpperCase= "Versaler: ". strtoupper($_GET['namn']);
			$strlength= "Antal tecken: ". strlen($_GET['namn']);
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
	<h1>Labb 1a - PHP-sidor</h1>
	<a href="../index.php">Länksida</a>
	<main>
		<h2>Allmänt</h2>
		<p>Här kommer det första Labbet, PHP-sida 2</p>
		<p>
			Den innehåller en HTML-sida med en inlänkad css-fil (style.css) för att
			styla sidans markup.
		</p>
		</p>
			Sidan utforskar Arrayer. Texeter hämtas via ett formulär och sparas till en 
			array där band annat <br> PHP-funktioner behandlar datat.<br>
			Datat skrivssedan på olika sätt eligt uppgiftens krav.
		</p>
		<p>
			Sidan inkluderar även ett footer-element med matnyttig information.
		</p>
		<h2>Arrayer</h2>
		<p class="info-txt"><?php echo $stringtext; ?></p>
		<form action="sida1.php" method="get">
			<div>
				<label for="animal-1">Djur ett</label>
				<input type="text" name="animal-1" id="animal-1" 
				placeholder="Exempel: Ko">
			</div>
			<div>
				<label for="animal-1">Djur två</label>
				<input type="text" name="animal-1" id="animal-1" 
				placeholder="Exempel: Gris">
			</div>
			<div>
				<label for="animal-1">Djur tre</label>
				<input type="text" name="animal-1" id="animal-1" 
				placeholder="Exempel: Häst">
			</div>
			
			<input type="submit" value="Skicka text" name="submit">
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
		</form>
	</main>
    <?php
        require_once 'footer.php';
    ?>
</body>