<?php
	session_start();
	if (!isset($_SESSION['logedIn']) || $_SESSION['logedIn'] != true){ // För att sätta ett värde till session-index(logedIn) om ej satt
		$_SESSION['logedIn'] = false;
        header("Location: ../../index.php");
		exit();
	}
    require_once('../db.php');
    
    if (isset($_POST['updateProfile'])) { //
        $user = get_user($_SESSION['userName']);
        echo $id = $user['0']['id'];
        echo "<br>";
        echo $title = $_POST['profile'];
        if (empty($title)) {
            echo 'titel tom';
            $title = $user['0']['title'];
        }
        
        echo "<br>";
        echo $presentation = $_POST['presentation'];
        if (empty($presentation)) {
            echo 'presentation tom';
            $presentation = $user['0']['presentation'];
        }

        handle_user_profil($title, $presentation, $id);
    }
	include '../../includes/show_errors.php'; // inkludera vid utveckling för att få feedback på eventuella fel i koden
	// include 'includes/handel_login.php'; // funktion för att hantera login
	// include 'includes/handel_newUser.php'; // funktion för att hantera ny anvävdare
	// require_once('../db.php');

	// if (isset($_POST['login'])){ // Användare loggar in
	// 	handelLogIn($_POST['logInNamn'], $_POST['logInPassword']);
	// } elseif (isset($_POST['saveNewUser'])){ //Sparar nytt lösen till användare
	// 	handelNewUser($_POST['saveNewUserNamn'], $_POST['saveNewUserPassword']);
	//}
?>
<!doctype html>
<html lang="sv">
	<head>
	<meta charset="utf-8">
	<title>Dag Fredriksson Luleå Universitet</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
	<link rel="stylesheet" href="../../css/style.css">
	</head>
	<body>
		<header>
			<div class="nav-link-to-start-page">
				<div class="button-link">
					<span class="material-symbols-outlined double-arrow">
						double_arrow
					</span> 
					<a href="../../index.php">Startsidan</a> 
				</div>
			</div>
            <h1 class="welcome-heading">Väkommen <?php  echo $_SESSION['userName']; ?> till din adminsida :-)</h1>
            <div class="blogg-info-border">
                <div class="blogg-info">
                        <P>Här kan du redigera din profil eller skriva blogginkägg. Lycka till!</p>
                </div>
            </div>
		</header>
		<main class=user-admin-conatiner>
            <div class="user-profile admin-container">
                <form action="user_admin.php" method="post" class="user-profile-form" id="userProfile" >
					<h1>Hantera din frofil</h1>
					<div class="form-container-user">
						<div class="form-container-user__row">
							<input class="full-width" type="text" name="profile" id="profile" placeholder="Lägg till eller ändra titel">
							<span id="nameError" class="errorMessage"></span>
						</div>
						<div class="form-container-user__row">
                        <textarea class="full-width" id="presentation" name="presentation" rows="4" 
                                  placeholder="Skriv en pressentation om dig själv"></textarea>
							<span id="passwordError" class="errorMessage"></span>
						</div>
                        <div class="form-container-user__row">
                            <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                            <label class="button-upload" for="upload">Ladda upp en avatar-bild</label>
                            <input disabled id="upload" type="file" name="file_upload" value="test" accept="image/*" hidden/>
                        </div>
						<div class="form-container-user__row">
							<input class="button-admin" type="submit" value="Spara profil" name="updateProfile" id="submit-login">
						</div>
					</div>
				</form>
            </div>
            <div class="user-posts admin-container">
            <form action="xxx.php" method="post" class="login-form" id="userLogin" >
                <h1>Skapa ett inlägg</h1>
                <span id="loginMessage" class="errorMessage"></span>
                <p>Logga in</p>
                <div class="form-container">
                    <div>
                        <input type="text" name="logInNamn" id="logInNamn" placeholder="Skriv in ditt namn här">
                        <span id="nameError" class="errorMessage"></span>
                    </div>
                    <div>
                        <input type="password" name="logInPassword" id="logInPassword" placeholder="Skriv in ditt lösenord här">
                        <span id="passwordError" class="errorMessage"></span>
                    </div>
                    <div>
                        <input class="button-login" type="submit" value="Logga in" name="login" id="submit-login">
                    </div>
                </div>
            </form>
            </div>
		</main>
		<footer>
			<?php require_once '../../layout/footer.php'; ?>