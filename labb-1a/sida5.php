<?php ?>
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
				<p>Här kommer det första Labbet, PHP-sida 5</p>
				<p>
					Den innehåller en HTML-sida med en inlänkad css-fil &#40;style.css&#41; för att
					styla sidans markup.
				</p>
				<p>
					Sidan använder pressenter servervariabler med matnyttig information
					som webbserven har hand om, IP-adress, sidnamn mm.
				</p>
				<p>
					Sidan inkluderar även ett footer-element med matnyttig information.
				</p>
				<h2>Servervariabler</h2>
				<p>Använd servervariabeln för att presentera följande i din php-sida:</p>
				<ol type="a">
					<li>
						<p>
							Namnet på den server som skriptet körs på.<br>
							<span class="answer">Svar på fråga a:</span><br>
							<?php
							echo "$"."_SERVER['SERVER_NAME'] = " .$_SERVER['SERVER_NAME'] . ".";
							?>
						</p>
					</li>
					<li>
						<p>
							Användarens IP-adress.<br>
							<span class="answer">Svar på fråga b:</span><br>
							<?php
								echo "$"."_SERVER['REMOTE_ADDR'] = " .$_SERVER['REMOTE_ADDR'] . ".";
							?>
						</p>
					</li>
					<li>
						<p>
							Filnamnet på PHP-sidan.<br>
							<span class="answer">Svar på fråga c:</span><br>
							<?php
								echo "$"."_SERVER['PHP_SELF'] = " .$_SERVER['PHP_SELF'] . ".<br>";
								$curPageName = substr($_SERVER["PHP_SELF"],strrpos($_SERVER["PHP_SELF"],"/")+1);  
								echo "Filnamnet på PHP-sidan: ".$curPageName;  
								echo "<br>";
							?>
						</p>
					</li>
					<li>
						<p>
							Den port, på användarens dator, som används för att kommunicera med webbservern.<br>
							<span class="answer">Svar på fråga d:</span><br>
							<?php
								echo "$"."_SERVER['SERVER_PORT'] = " .$_SERVER['SERVER_PORT'] . ".";
							?>
						</p>
					</li>
					<li>
						<p>
							Vilken metod som använts för att köra PHP-sidan<br>
							<span class="answer">Svar på fråga e:</span><br>
							<?php
								echo "$"."_SERVER['REQUEST_METHOD'] = " .$_SERVER['REQUEST_METHOD'] . ".";
							?>
						</p>
					</li>
				</ol>
			</div>
			<div class="grid col-2">
				<?php
					echo "<h2>Se alla servervariabler ";
					echo "$"."_SERVER: ";
					echo "</h2>";
					if (isset($_GET['server-variables'])){ 
						echo "<p><a class=\"server-variables up\" href=\"sida5.php\">
						<span>Dölj</span></a></p>";
						echo "<div class=\"text-container\">";
						foreach($_SERVER as $key => $value){
							echo("Värdet för $key är : $value <br>");
						}
						echo "</div>";
					} else {
						echo "<p><a class=\"server-variables down\" href=\"sida5.php?server-variables\">";
						echo "<span>Visa</span>";	
						echo "</a></p>";
					}
				?>
				</div>
		</main>
		<?php
			require_once 'footer.php';
		?>
	</body>
</html>