<?php
	if (isset($_GET['reset'])){ 
		header("Location: sida2.php");
	}
	$farmAnimals = [];
	$ifSubmit = false;
	if (isset($_GET['submit'])){ 
		if ($_GET['animal-1'] != ""){ 
			$farmAnimals[] = $_GET['animal-1'];
		} else {
			$farmAnimals[] = $_GET['animal-1-placeholder'];
		}
		if ($_GET['animal-2'] != ""){ 
			$farmAnimals[] = $_GET['animal-2'];
		} else {
			$farmAnimals[] = $_GET['animal-2-placeholder'];
		}
		if ($_GET['animal-3'] != ""){ 
			$farmAnimals[] = $_GET['animal-3'];
		} else {
			$farmAnimals[] = $_GET['animal-3-placeholder'];
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
			<p>Här kommer det första Labbet, PHP-sida 2</p>
			<p>
				Den innehåller en HTML-sida med en inlänkad css-fil (style.css) för att
				styla sidans markup.
			</p>
			</p>
				Sidan utforskar Arrayer. Texeter hämtas via ett formulär och sparas till en 
				array där band annat PHP-funktioner behandlar datat.
				Datat skrivs sedan up på olika sätt eligt uppgiftens krav.
			</p>
			<p>
				Sidan inkluderar även ett footer-element med matnyttig information.
			</p>
			<h2>Arrayer</h2>
			<p class="info-txt">
			Mata ut tre olika soters djur i fälten nedan och låt PHP <br>
			utföra lite beräkningar genom att klicka på skicka knappen
			</p>
			<form action="sida2.php" method="get">
				<div>
					<label for="animal-1">Djur ett</label>
					<input type="hidden" name="animal-1-placeholder" 
					id="animal-1-placeholder" value="Ko">
					<input type="text" name="animal-1" id="animal-1" 
					placeholder="Exempel: Ko">
				</div>
				<div>
					<label for="animal-1">Djur två</label>
					<input type="hidden" name="animal-2-placeholder" 
					id="animal-2-placeholder" value="Gris">
					<input type="text" name="animal-2" id="animal-2" 
					placeholder="Exempel: Gris">
				</div>
				<div>
					<label for="animal-1">Djur tre</label>
					<input type="hidden" name="animal-3-placeholder" 
					id="animal-1-placeholder" value="Häst">
					<input type="text" name="animal-3" id="animal-3" 
					placeholder="Exempel: Häst">
				</div>	
				<input type="submit" value="Skicka värden" name="submit">
				<input type="submit" value="Återställa" name="reset">
			</form>
		</div>
		<div class="grid col-2">
			<h2>Resultat:</h2>
		<?php
			if($ifSubmit == true) {
			?>
			<ol type="a">
				<li>
					<p>
						Sparar djuren som är inmatade i formuläret till arrayen $farmAnimals, 
						första djuret ska ligga på index 0 i arrayen, andra djuret på index 1 
						och tredje djuret på index 2.
					</p>
					<?php
						echo "<p> <span class=\"answer\">Svar på fråga a:</span><br>";
						foreach($farmAnimals as $key => $value){
							echo("index för $value är $key <br>");
						}
						echo "</p>";
					?>
				</li>
				<li>
					<p>
						Skriver ut arrayen i råformat med funktionen print_r.
					</p>
					<?php
						echo "<p> <span class=\"answer\">Svar på fråga b:</span><br>";
						print_r($farmAnimals);
						echo "</p>";
					?>
				</li>
				<li>
					<p>
						Ersätter djuret på tredje platsen med djuret ”Struts”.
					</p>
					<?php
						echo "<p><span class=\"answer\">Svar på fråga c:</span><br>";
						$count = 1;
						$farmAnimals[2] = "Struts";
						foreach ($farmAnimals as $key => $value ){
							$place = $count++;
							echo("$value är på plats: $place  <br>");
						}
						echo "</p>";
					?>
				</li>
				<li>
					<p>
						Lägger till ett fjärde djur ”Alpacka” sist i arrayen.
					</p>
					<?php
						echo "<p><span class=\"answer\">Svar på fråga d:</span><br>";
						array_push($farmAnimals, "Alpacka");
						foreach($farmAnimals as $key => $value){
							echo("$value <br>");
						}
						echo "</p>";
					?>
				</li>
				<li>
					<p>
						Tar bort det första elementet helt från arrayen.
					</p>
					<?php
						echo "<p><span class=\"answer\">Svar på fråga e:</span><br>";
						unset($farmAnimals[0]);
						foreach($farmAnimals as $key => $value){
							echo("$value <br>");
						}
						echo "</p>";
					?>
				</li>
				<li>
					<p>
						Skriver ut arrayen i råformat med funktionen print_r.
					</p>
					<?php
						echo "<p><span class=\"answer\">Svar på fråga f:</span><br>";
						print_r($farmAnimals);
						echo "</p>";
					?>
				</li>
				<li>
					<p>
						Skriver ut elementet som finns på andra platsen i arrayen,
						vilket nu borde vara ”Struts” eftersom det första djuret är borttaget.
					</p>
					<?php
						echo "<p><span class=\"answer\">Svar på fråga g:</span><br>";
						echo "Druret på andra plats är \"$farmAnimals[2]\"";
						echo "</p>";
					?>
				</li>
			</ol>
		<?php
			}
		?>
		</div> 
	<?php
		require_once 'menu.php';
	?>
	</main>
    <?php
        require_once 'footer.php';
    ?>
</body>