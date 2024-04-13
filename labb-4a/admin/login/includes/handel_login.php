<?php
    function handelLogIn ($logInName = '', $logInPassword = '') { // Hanterar ny login
        $user = '';
        $userExists = false;
        $password = '';
        $validUser = false;
        $_SESSION['logInInfo'] = '';
        $filename = 'login.txt'; 
        require_once 'check_user.php'; // Funktion som kollar om användare finns eller har rätt användarnamn och lösenord

        $isCorrectPassword = password_verify($logInPassword, $password); // Kollar det krypterade/hachade lösenordet om sant (true).
        
        switch (true):
            case $logInName == "" || $logInPassword == "": // Om lösen eller lösenord saknas
                $_SESSION['logInInfo'] = "Namn eller lösenord saknas!"; // sparar data i sessionen
                $_SESSION['viewInfo'] = true;
                session_destroy();
                break;
            case $userExists && $isCorrectPassword: // Om användare finns och har rätt lösenord
                $validUser = true;
                if ($validUser){ 
                    $_SESSION['userName'] = $user;
                    $_SESSION['logedIn'] = $validUser;
                    header("Location: ../../index.php");
                }
                break;
            default: // Alla övriga fall
                $_SESSION['logInInfo'] = "Användarnamnet eller lösenordet är ogiltigt!"; // sparar data i sessionen
                $_SESSION['viewInfo']  = true;
                session_destroy();
        endswitch;
	}
?>