<?php
    function handelNewUser ($NewUserName = '', $NewPassword = '') { // Hanterar ny användare
        $user = '';
        $userExists = false;
        $logInName = $NewUserName;

        require_once 'check_user.php'; // Funktion som kollar om användare finns eller har rätt användarnamn och lösenord

        switch (true):
            case $userExists; // Ny användare finns redan
                header("Location: ../login/login.php?newUserNamnExists=Namnet är upptaget! &userName=&newUserNamn=$NewUserName");
                session_destroy();
                break;
            default: // Ny användare skapas och läggs in i databasen om den inte finns. 
                $hashPassword = password_hash($NewPassword, PASSWORD_DEFAULT); // krypterar/hash:ar lösenordet
                add_user($NewUserName, $hashPassword);
                header("Location: ../login/login.php?logInInfoMessage=Nu är $NewUserName tillagd!&userName=");
                session_destroy();
        endswitch;
	}
?>