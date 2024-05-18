<?php
	// session_start();
	// if (!isset($_SESSION['logedIn']) || $_SESSION['logedIn'] != true){ // För att sätta ett värde till session-index(logedIn) om ej satt
	// 	$_SESSION['logedIn'] = false;
	// }
	// if( isset( $_SESSION['userName'] ) ) { // Användare inloggad
	// 	$userName = $_SESSION['userName'];
	// 	$loggedInUser = 'Välkommen ' . $_SESSION['userName'];
	// 	$userName = $_SESSION['userName'];
	//  }
    $userData = get_user($_SESSION['userName']); 
?>
<h2 class="secondary-heading">Din blogg-profil</h2>

<?php if($_SESSION['logedIn'] != true) { ?>
    <p>När en bloggare är inloggad kommer profilinformationen synas här.</p> 
    <p>Bli en ny blobbare eller logga in?
        <a class="info-link" href="admin/login/login.php">Skapa konto eller logga in</a>
        <span class="material-symbols-outlined double-arrow">
            double_arrow
        </span> 
    </p>
        
<?php } else { ?>
    <p>Användarnamn: <?php echo $_SESSION['userName'];?></p>
    <p>Titel: <?=$userData['0']['title']?></p>
    <p>Om mig: <?=$userData['0']['presentation']?></p>
    <p>Skapa en egen blogg eller redigera ditt konto
    <div class="button-link">
        <a href="admin/cms/user_admin.php">Mitt admin</a> 
		<span class="material-symbols-outlined double-arrow">
			double_arrow
		</span> 
		
	</div></p>
<?php } ?>

<h2 class="secondary-heading">Veckans bloggare!</h2>
<p>Dag Fredriksson. Grattis!</p>
<p>
    Denna veckas bloggare (v:23) har varit mecket aktiv 
    och skrivit om allt mellan himmel och jord. 
</p>
Se alla Dag Fredrikssons inlägg klicka 
<a class="info-link" href="index.php">här
<span class='material-symbols-outlined read-more'>
    read_more
</span> 
</a>

