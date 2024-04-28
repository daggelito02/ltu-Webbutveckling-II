<?php
    function handelNewUser ($NewUserName = '', $NewPassword = '') { // Hanterar ny användare
        $userExists = false;
        $logInName = $NewUserName;

        require_once 'check_user.php'; // Funktion som kollar om användare finns eller har rätt användarnamn och lösenord

        switch (true):
            case $NewUserName == "" || $NewPassword == "": // Ny användare saknar namn eller lösenord
                $_SESSION['logInInfo'] = "Nytt Namn eller nytt lösenord saknas!";
                $_SESSION['viewInfo'] = true;
                session_destroy();
                break;
            case $userExists; // Ny användare finns redan
                $_SESSION['logInInfo'] = "Användarnamnet finns redan, pröva med ett annat."; // sparar data i sessionen
                $_SESSION['viewInfo']  = true;
                session_destroy();
                break;
            default: // Ny användare skapas och läggs in i databasen om den inte finns, annars skapas både fil & ny användare
                // $addLineBreak = '';
                // if (file_exists($filename)) {
                    
                //     $lines = count(file($filename)); // kollar on det finns linjer i filen...
                //     if($lines !== 0 ) { // ... om inte det finns linje så lägg till.
                //         $addLineBreak = "\n";
                //     }
                // } 

                $hashPassword = password_hash($NewPassword, PASSWORD_DEFAULT); // krypterar/hash:ar lösenordet
                add_user($NewUserName, $hashPassword);
                $_SESSION['logInInfo'] = "<p>Ditt användarnamn och lösenord är nu skapat.</p>
                <p>Logga nu in med ditt nya nvändarnamn :-)"; // sparar data i sessionen
                $_SESSION['viewInfo']  = true;
                
                
                session_destroy();

        endswitch;
	}
?>