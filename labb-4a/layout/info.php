<?php
    if (isset($_SESSION['userName'])) {
        $userData = get_user($_SESSION['userName']); 
    }
    
?>
<h2 class="secondary-heading">Din blogg-profil</h2>

<?php if ($_SESSION['logedIn'] != true) { ?>
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
    <?php if (!empty($presentation)) { ?>
        <p>Om mig: <?=$userData['0']['presentation']?></p>
    <?php } ?>
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
    Denna veckas bloggare (v:23) har varit mycket aktiv 
    och skrivit om allt mellan himmel och jord. 
</p>
Se alla Dag Fredrikssons inlägg klicka 
<a class="info-link" href="index.php?getUserPost=Dag%20Fredriksson&userId=32">här
<span class='material-symbols-outlined read-more-info'>
    read_more
</span> 
</a>

