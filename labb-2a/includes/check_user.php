<?php
    if (file_exists($filename)) {
        $lines = file('login.txt', FILE_IGNORE_NEW_LINES);
        foreach ( $lines as $line ) {
            parse_str($line, $userInfo);

            if(strcasecmp($logInName, $userInfo['user']) == 0) { //strcasecmp case-insensitive string comparison 
                $user = $userInfo['user'];
                $password = $userInfo['password'];
                $userExists = true;
            }
        }
    } else {
        $userExists = false;
    }
?>