<?php
	session_start();
	if (!isset($_SESSION['logedIn']) || $_SESSION['logedIn'] != true){ // För att sätta ett värde till session-index(logedIn) om ej satt
		$_SESSION['logedIn'] = false;
	}
	if( isset( $_SESSION['userName'] ) ) { // Användare inloggad
		$loggedInUser = 'Välkommen ' . $_SESSION['userName'];
		$userName = $_SESSION['userName'];
	 } 
?>

<div class="course-nav-link-to-menu">
    <a class="button-link" href="../index.php">&laquo; Länksida</a> 
</div>
<h1>Välkommen till bloggen</h1>
<div class="user-info">
    <P>Här kan du vara med att blogga och skriva in lite kul inlägg om som du vill dela med dig av.</p>
    <?php if($_SESSION['logedIn'] != true) { ?>
        <p> Logga in eller skapa ett nytt konto. 
        <a href="admin/login/login.php">Till logga in sidan &raquo;</a> 
    <?php } else { echo $loggedInUser = 'Välkommen ' . $_SESSION['userName'];?>
        <form action="admin/login/login.php" method="post">
					<input type="hidden" name="userName" value="<?=$userName?>">
					<input type="submit" value="Logga ut" name="logout">
				</form>
			</div>
    <?php } ?>
</div>
