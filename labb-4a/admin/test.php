<?php
    include '../includes/show_errors.php'; // inkludera vid utveckling för att få feedback på eventuella fel i koden
	require_once('db.php');
    $username = 'Selma';
    $password = 'semlan';
    //add_user($username, $password);
    echo "Add user"; 
    echo "<br>";
    //$theUser = get_users($username);
    //var_dump($theUser);
    // echo $statment = "SELECT * FROM user";
    // $stmt = mysqli_prepare($connection, "SELECT * FROM user");
    //echo "<br>";

    global $connection;
    $sql = 'SELECT * FROM user';
    $statment = mysqli_prepare($connection, $sql);
    mysqli_stmt_execute($statment);

    $thesStatment = get_result($statment);
    echo "<pre>";
    print_r($thesStatment);
    echo "</pre>";

    // function get_result($statment) {
    //     $rows = array();
    //     $result = mysqli_stmt_get_result($statment);
    //     if($result) // Finns resultat
    //     {
    //         // Hämta rad för rad ur resultatet och lägg in i $row
    //         while ($row = mysqli_fetch_assoc($result))
    //         {
    //             $rows[] = $row;
    //         }
    //     }
    //     return $rows;
    // }


    echo "<br>";
    $rows = get_users();
    foreach($rows as $user)
    {
        $name = $user['username']; // username är namnet på kolumnen i databastabellen
        $pass = $user['password']; // password är namnet på kolumnen i databastabellen
        echo ("<p>$name - $pass</p>");
    }

    echo "<br>";

    echo "<br>";
    // $userid = "32";
    // //$rows = get_users();
    // $rows = get_posts($userid)
    // foreach($rows as $posts)
    // {
    //     $title = $posts['username']; // username är namnet på kolumnen i databastabellen
    //     $content = $posts['password']; // password är namnet på kolumnen i databastabellen
    //     echo ("<p>$title</p>");
    //     echo ("<p>$content</p>");
    // }

    // echo "<br>";

    //echo $addUser = add_user($username, $password);


    // function myMessage() {
    //     echo "<br>Hello world!<br>";
    // }
    // echo "<br>Users:<br>";
     $logInName = "dag fredriksson";
    if ($logInName != "") { // kollar om namn finns
        $rows = get_users();
        foreach($rows as $user) { // stegar igenom alla rader i db:n för att matcha eventuell användare
            $name = $user['username']; // Save as string
            $pass = $user['password']; // Save as string
            if(strcasecmp($logInName, $name) == 0) { //strcasecmp case-insensitive string comparison 
                $user = $name; // // sparar data i sessionen
                echo gettype($user);

                $password = $pass;
                $userExists = true;       
            }
        }
    } else {
        $userExists = false;
    }

    $title = 'Bloggare';
    $presentation = 'Jag är en student';
    $id = 32;

    //handle_user_profil($title, $presentation, $id);


    $username = 'Dag Fredriksson';

    $username = get_user($username);
    echo "<pre>";
    print_r($username);
    echo $username['0']['title'];
    echo "<br>";
    echo $username['0']['presentation'];
    echo "<br>";
    echo "The id" . $username['0']['id'];
    echo "</pre>";

     echo "<br><br>Post med id: ";
     $thePost = get_posts($username['0']['id']);
                echo "<pre>";
                print_r($thePost);
                echo "</pre>";
                echo "här";
?>