<?php
    if ($logInName != "") { // kollar om namn finns
        $rows = get_users();
        foreach($rows as $user) { // stegar igenom alla rader i db:n för att matcha eventuell användare
            $name = $user['username']; // Sparar om som sträng
            $pass = $user['password']; // Sparar om som sträng
            if(strcasecmp($logInName, $name) == 0) { //strcasecmp case-insensitive string comparison 
                $theUser = $name; // // sparar data i sessionen
                $password = $pass;
                $userExists = true;       
            }
        }
    } else {
        $userExists = false;
    }
?>