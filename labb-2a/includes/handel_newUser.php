<?php
    function handelNewUser ($NewUserName = '', $NewPassword = '') {
        $user = '';
        $userExists = false;
        $logInName = $NewUserName;
        $filename = 'login.txt'; 

        require_once 'check_user.php'; // Funktion som kollar om användare finns eller har rätt användarnamn och lösenord

        switch (true):
            case $NewUserName == "" || $NewPassword == "": // Ny användare saknar namn eller lösenord
                $_SESSION['logInInfo'] = "Nytt Namn eller nytt lösenord saknas!";
                $_SESSION['viewInfo'] = true;
                session_destroy();
                break;
            case $userExists; // Ny användare finns redan
                $_SESSION['logInInfo'] = "Användarnamnet finns redan, pröva med ett annat.";
                $_SESSION['viewInfo']  = true;
                session_destroy();
                break;
            default: // Ny användare skapas i login.txt filen om den finns annars skapas både fil & ny användare
                $addLineBreak = '';
                if (file_exists($filename)) {
                    
                    $lines = count(file($filename)); // kollar on det finns linjer i filen...
                    if($lines !== 0 ) { // ... om inte det finns linje så lägg till.
                        $addLineBreak = "\n";
                    }
                } 
                $hashPassword = password_hash($NewPassword, PASSWORD_DEFAULT); // krypterar/hash:ar lösenordet
                $loginFile = fopen($filename, "a") or die("Unable to open file!");
                $userLoggInText = $addLineBreak .'user='. $NewUserName . '&password=' . $hashPassword; // skapar en användarrad med namn och lösen.
                fwrite($loginFile, $userLoggInText);
                fclose($loginFile);
                $_SESSION['logInInfo'] = "Ditt användarnamn och lösenord är nu skapat.";
                $_SESSION['viewInfo']  = true;
                session_destroy();

        endswitch;
	}
?>