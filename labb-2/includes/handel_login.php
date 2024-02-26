<?php
    function handelLogIn ($logInName = '', $logInPassword = '') {
        $user = '';
        $userExists = false;
        $validUser = false;
        $_SESSION['logInInfo'] = '';
        $filename = 'login.txt'; 
        require_once 'check_user.php';

        switch (true):
            case $logInName == "" || $logInPassword == "":
                $_SESSION['logInInfo'] = "Namn eller lösenord saknas!";
                $_SESSION['viewInfo'] = true;
                session_destroy();
                break;
            case $userExists && $logInPassword == $password:
                $validUser = true;
                if ($validUser){ 
                    $_SESSION['userName'] = $user;
                    $_SESSION['logedIn'] = $validUser;
                    header("Location: index.php");
                }
                break;
            default:
                $_SESSION['logInInfo'] = "Användarnamnet eller lösenordet är ogiltigt!";
                $_SESSION['viewInfo']  = true;
                session_destroy();
        endswitch;
	}
?>