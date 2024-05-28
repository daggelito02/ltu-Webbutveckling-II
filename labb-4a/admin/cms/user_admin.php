<?php
	session_start();
	if (!isset($_SESSION['logedIn']) || $_SESSION['logedIn'] != true){ // För att sätta ett värde till session-index(logedIn) om ej satt
		$_SESSION['logedIn'] = false;
        header("Location: ../../index.php");
		exit();
	} 

    $adminInfo = "";
    $adminInfoPost = "";
    $error = "";

    if (isset($_GET['adminInfo'])) { 
        $adminInfo = $_GET['adminInfo'];
    }

    if (isset($_GET['adminInfoPost'])) { 
        $adminInfoPost = $_GET['adminInfoPost'];
    }

    if (isset($_GET['error'])) { 
        $error = $_GET['error'];
    }


	include '../../includes/show_errors.php'; 
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
            <h1 class="heading">Väkommen <?php  echo $_SESSION['userName']; ?> till din adminsida :-)</h1>
            <div class="blogg-info-border">
                <div class="blogg-info">
                        <P>Här kan du redigera din profil eller skriva blogginkägg. Lycka till!</p>
                </div>
            </div>
		</header>
		<main class=user-admin-conatiner>
            <p class="admin-info"><?=$error?></p>
            <div class="user-profile admin-container">
                <form action="handle_admin_data.php" method="post" class="user-profile-form" id="userProfile" >
					<h1>Hantera din profil</h1>
					<div class="form-container-user">
                        <p class="admin-info"><?=$adminInfo?></p>
						<div class="form-container__row">
							<input maxlength="30" class="full-width" type="text" name="profile" id="profile" placeholder="Lägg till eller ändra titel">
						</div>
						<div class="form-container__row">
                        <textarea maxlength="200" class="full-width" id="presentation" name="presentation" rows="4" 
                                  placeholder="Skriv en pressentation om dig själv (max 200 tecken)"></textarea>
						</div>
                        <div class="form-container__row">
                            <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                            <label class="button-upload" for="upload">Ladda upp en avatar-bild</label>
                            <input disabled id="upload" type="file" name="file_upload" value="test" accept="image/*" hidden/>
                        </div>
						<div class="form-container__row">
							<input class="button-admin" type="submit" value="Spara profil" name="updateProfile" id="update-profile">
						</div>
					</div>
				</form>
            </div>
            <div class="user-posts admin-container">
            <form action="handle_admin_data.php" method="post" class="user-profile-form" id="userPost" >
                <h1>Skapa ett inlägg</h1>
                <p class="admin-info"><?=$adminInfoPost?></p>
                <div class="form-container-add-post">
                    <div class="form-container__row">
                        <input class="full-width" maxlength="60" type="text" name="postTitle" id="postTitle" placeholder="Title (max 60 tecken)">
                    </div>
                    <div class="form-container__row">
                    <textarea class="full-width" id="content" name="content" rows="10" 
                                  placeholder="Skriv en bra post"></textarea>
                    </div>
                    <div class="form-container__row">
                        <input class="button-admin" type="submit" value="Logga in" name="addUserPost" id="add-user-post">
                    </div>
                </div>
            </form>
            </div>
		</main>
		<footer>
			<?php require_once '../../layout/footer.php'; ?>