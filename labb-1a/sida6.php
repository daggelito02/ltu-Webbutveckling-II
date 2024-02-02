<?php
  	
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
			<p>Här kommer det första Labbet, PHP-sida 6</p>
			
			<h2>Sända och ta emot data</h2>
			<p><?php echo $stringtext; ?></p>
			<form action="xxxx.php" method="get">
				<input type="text" name="namn" id="namn" placeholder="Skriv in ditt namn här">
				<input type="submit" value="Skicka namnet" name="submit">
			</form>
		</div>
		<div class="grid col-2">
			<h2>Resultat:</h2>
			<p>
				<?php echo $strName; ?>
			</p>
		</div>
	</main>
    <?php
        require_once 'footer.php';
    ?>
</body>