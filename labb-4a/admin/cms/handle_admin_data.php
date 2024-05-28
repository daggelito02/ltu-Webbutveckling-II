<?php
	session_start();
	if (!isset($_SESSION['logedIn']) || $_SESSION['logedIn'] != true){ // För att sätta ett värde till session-index(logedIn) om ej satt
		$_SESSION['logedIn'] = false;
        header("Location: ../../index.php");
		exit();
	}
    require_once('../db.php');
    
    if (isset($_POST['updateProfile'])) { // update/add profile
        

        $user = get_user($_SESSION['userName']);
        $id = $user['0']['id'];
        $title = $_POST['profile'];
        $presentation = $_POST['presentation'];
        // if (!empty($title or $_POST['presentation'])) {
        //     header('Location: ./user_admin.php?adminInfo="Din profil är uppdaterad."');
        // }

        if (empty($title)) {
            $title = $user['0']['title'];
        }

        if (empty($presentation)) {
            $presentation = $user['0']['presentation'];
        }
        
        if (handle_user_profil($title, $presentation, $id)) {
            header('Location: ./user_admin.php?adminInfo=Din profil är uppdaterad!');

        } else {
            header('Location: ./user_admin.php?error=Något har går fel! Försök ingen.');
        }

    }

    if (isset($_POST['addUserPost'])) { //
        //echo "addUserPost";

        $user = get_user($_SESSION['userName']);
        $userId = $user['0']['id'];
        //echo "<br>";
        $title = $_POST['postTitle'];
        //echo "<br>";
        $content = $_POST['content'];
        //echo $sanitized_text = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');

        add_post($title, $content, $userId);

        if (add_post($title, $content, $userId)) {
            header('Location: ./user_admin.php?adminInfoPost=Ditt blogginlägg skapat!');

        } else {
            header('Location: ./user_admin.php?error=Något har går fel! Försök ingen.');
        }
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