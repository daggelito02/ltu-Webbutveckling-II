<?php
    if (file_exists($filename)) { // kollar om fil finns
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        foreach ( $lines as $line ) { // stegar igenom alla rader för att matcha eventuell användare
            parse_str($line, $userInfo);

            if(strcasecmp($logInName, $userInfo['user']) == 0) { //strcasecmp case-insensitive string comparison 
                $user = $userInfo['user']; // // sparar data i sessionen
                $password = $userInfo['password'];
                $userExists = true;
            }
        }
    } else {
        $userExists = false;
    }
?>