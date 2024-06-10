<?php 
	$loggedInStatus = "Logga ut";
	$loggedInStatusName = "logout";
	if($_SESSION['logedIn'] != true) { 
		$loggedInStatus = "Logga in";
		$loggedInStatusName = "resetLogin";
	}
?>

<div class="course-nav-link-to-menu">
	<div class="button-link">
		<span class="material-symbols-outlined double-arrow">
			double_arrow
		</span> 
		<a href="../index.php">Länksida</a> 
	</div>
</div>
<h1 class="heading">Välkommen <?php If($_SESSION['logedIn'] == true) { echo $_SESSION['userName']; } ?> till bloggen!</h1>
<div class="blogg-info-border">
	<div class="blogg-info">
		<?php 
			if($_SESSION['logedIn'] != true) { ?>
			<P>Här kan du vara med att blogga och skriva in lite kul inlägg som du kan dela med dig av.</p>
			<p>Nedan följer ett urval av blogginlägg från olika bloggare med senaste inlägget överst.</p>
			<p>Du kan välja valfri bloggare från vänstermenyn och läsa bloggarens innlägg-tråd</p>
		<?php } else {  ?>
			<P>Som inloggad har du möjlighet att skapa egna inlägg.</p>
			<p>Klicka på knappen "Mitt admin" som du hittar till höger i profil delen.</p>
		<?php } ?>
	</div>
</div>
<form class="logout" action="admin/login/login.php" method="post">
	<?php if($_SESSION['logedIn'] == true) { ?> 
		<input type="hidden" name="userName" value="<?=$userName?>">
	<?php } ?>
	<div class="button-link">
		<input type="submit" value="<?=$loggedInStatus?>" name="<?=$loggedInStatusName?>">
		<span class="material-symbols-outlined double-arrow">
			double_arrow
		</span> 
	</div>
</form>