<?php
	$ifSubmit = false;
  	if (isset($_GET['submit'])){ 
		if ($_GET['word-array'] != ""){
			$wordArray  = $_GET['word-array'];
			$wordArray = explode(" ", $wordArray);
		} else {
			$wordArray  = $_GET['word-array-placeholder'];
			$wordArray = explode(" ", $wordArray);
		}
		if ($_GET['search-word'] != ""){
			$searchWord  = $_GET['search-word'];
		} else {
			$searchWord = $_GET['search-word-placeholder'];
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
		<h1>Labb 1a - PHP-sidor (PHP-sida 3)</h1>
		<a href="../index.php">Länksida</a>
	</div>
	<main>
		<div class="grid col-1">
			<h2>Allmänt</h2>
			<p>Här kommer det första Labbet, PHP-sida 3</p>
			<p>
				Den innehåller en HTML-sida med en inlänkad css-fil (style.css) för att
				styla sidans markup.
			</p>
			</p>
				Sidan utforskar oopar och villkorssatser. Texeter hämtas via ett formulär och sparas bland
				annat till en array där band annat PHP-funktioner behandlar datat.
				Datat skrivs sedan up på olika sätt eligt uppgiftens krav.
			</p>
			<p>
				Sidan inkluderar även ett footer-element med matnyttig information.
			</p>			
			<h2>Loopar och villkorssatser</h2>
			<p><?php echo $stringtext; ?></p>
			<form action="sida3.php" method="get">
				<div>
				<input type="text" name="word-array" id="word-array" placeholder="jag gillar faktiskt misstag jag tycker att de är mänskliga">
				<input type="hidden" name="word-array-placeholder" 
					id="word-array-placeholder" 
					value="jag gillar faktiskt misstag jag tycker att de är mänskliga"
				>
				</div>
				<div>
				<input type="text" name="search-word" id="search-word" placeholder="Sökord">
				<input type="hidden" name="search-word-placeholder" 
					id="search-word-placeholder" value="Sökord">
				</div>
				<input type="submit" value="Skicka orden" name="submit">
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
					Hämtar strängen med ord från textfältet och utifrån den genererar en array 
					där varje ord hamnar på en egen plats i arrayen, 
					ex: "jag gillar faktiskt misstag jag tycker att de är mänskliga".
					</p>
					<?php
						echo "<p> <span class=\"answer\">Svar på fråga a:</span><br>";
						foreach($wordArray as $key => $value){
							echo $value . "[" .$key . "] ";
						}
						echo "</p>";
					?>
				</li>
				<li>
					<p>
						Sparar sökordet från det andra textfältet i en egen variabel.
					</p>
					<?php
						echo "<p> <span class=\"answer\">Svar på fråga b:</span><br>";
						echo("Sökordet: $searchWord");
						echo "</p>";
					?>
				</li>
				<li>
					<p>
						Skriver ut arrayen med ord i råformat med funktionen print_r.
					</p>
					<?php
						echo "<p> <span class=\"answer\">Svar på fråga c:</span><br>";
						print_r($wordArray);
						echo "</p>";
					?>
				</li>
				<li>
					<p>
						Loopar igenom arrayen och använd en if-sats för att jämföra sökordet
						med varje ord i arrayen. Är ordet i arrayen lika med sökordet så 
						skriv ut den plats sökordet hittades på (se utskriftsförslaget nedan).
						<br>
						<?php print_r($wordArray); ?>
					</p>
					<?php
						echo "<p> <span class=\"answer\">Svar på fråga d:</span><br>";
						echo "Ordet \"$searchWord\" finns på plats: ";
						$showKeyValue = false;
						foreach($wordArray as $key => $value){
							$key = $key+1;
							
							if ($value == $searchWord) {
								echo $key . " ";
								$showKeyValue = true;
							}
						} 
						if ($showKeyValue == false) {
							echo "saknar plats.";
						}
						echo "</p>";
					?>
				</li>
				<li>
					<p>
						Skriv även ut hur många gånger som sökordet hittades i arrayen.
					</p>
					<?php
						$count = 1;
						$amountOfhits = "0";
						echo "<p> <span class=\"answer\">Svar på fråga e:</span><br>";
						foreach($wordArray as $key => $value){
							
							if ($value == $searchWord) {
								$amountOfhits = $count++;
							}
						}
						echo "Ordet $searchWord hittades $amountOfhits gånger.";
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