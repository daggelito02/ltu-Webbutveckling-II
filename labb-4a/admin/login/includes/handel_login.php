<?php
//echo "I handle log in";
    function handelLogIn ($logInName = '', $logInPassword = '') { // Hanterar ny login
        $user = '';
        $userExists = false;
        $password = '';
        $validUser = false;
        $_SESSION['logInInfo'] = '';
        require_once 'check_user.php'; // Funktion som kollar om användare finns eller har rätt användarnamn och lösenord
       
        $isCorrectPassword = password_verify($logInPassword, $password); // Kollar det krypterade/hachade lösenordet om sant (true).
        
        switch (true):
            case $userExists && $isCorrectPassword: // Om användare finns och har rätt lösenord
                $validUser = true;
                if ($validUser){    
                    $_SESSION['userName'] = $theUser;
                    $_SESSION['logedIn'] = $validUser;
                    header("Location: ../../index.php");
                    exit();
                }
                break;
            case $logInName != $theUser: // Om användarnamnet saknas
                //$_SESSION['logInInfoName'] = "Användare saknas eller är användarnamnet fel!"; // sparar data i sessionen
                //$_SESSION['viewInfo'] = true;
                header("Location: ../login/login.php?logInInfoName=Namnet är fel! &userName=$logInName");
                session_destroy();
                break;
            case $isCorrectPassword == false: // Om lösenord är fel
                // $_SESSION['logInInfoPassword'] = "lösenordet är fel!"; // sparar data i sessionen
                // $_SESSION['viewInfo'] = true;
                header("Location: ../login/login.php?logInInfoPass=Lösenordet är fel!&userName=$logInName");
                session_destroy();
                break;
            default: // Alla övriga fall
                // $_SESSION['logInInfoElse'] = "Något fungerar inte! Kontakta admin admin@admin.se"; // sparar data i sessionen
                // $_SESSION['viewInfo']  = true;
                header("Location: ../login/login.php?logInInfoError=Något fungerar inte! Kontakta admin admin@admin.se&userName=$logInName");
                session_destroy();
        endswitch;
	}
?>