<?php
    function handelNewUser ($NewUserName = '', $NewPassword = '') {
        $user = '';
        $userExists = false;
        $logInName = $NewUserName;
        $filename = 'login.txt'; 

        require_once 'check_user.php'; 

        switch (true):
            case $NewUserName == "" || $NewPassword == "":
                $_SESSION['logInInfo'] = "Nytt Namn eller nytt lösenord saknas!";
                $_SESSION['viewInfo'] = true;
                session_destroy();
                break;
            case $userExists; 
                $_SESSION['logInInfo'] = "Användarnamnet finns redan, pröva med ett annat.";
                $_SESSION['viewInfo']  = true;
                session_destroy();
                break;
            default:
                $addLineBrack = '';
                if (file_exists($filename)) {
                    
                    $lines = count(file($filename)); 
                    if($lines !== 0 ) {
                        $addLineBrack = "\n";
                    }
                } 
                $loginFile = fopen($filename, "a") or die("Unable to open file!");
                $userLoggInText = $addLineBrack .'user='. $NewUserName . '&password=' . $NewPassword;
                fwrite($loginFile, $userLoggInText);
                fclose($loginFile);
                $_SESSION['logInInfo'] = "Ditt användarnamn och lösenord är nu skapat.";
                $_SESSION['viewInfo']  = true;
                session_destroy();

        endswitch;
	}
?>