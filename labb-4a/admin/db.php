<?php
require_once('db_credentials.php');

// Koppla upp mot databasen, detta gör vi en gång när skriptet startar (sidan laddas in)
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

function add_user($username, $password)
{
    global $connection; // Så vi kommer åt den globala variabeln

    // Skapa SQL-frågan
    $sql = 'INSERT INTO user (username, password) VALUES (?,?)';
    // Förbered frågan
    $statment = mysqli_prepare($connection, $sql);

    // Bind ihop variablerna med statement användarnamn och läsenord är strängar (s)
    mysqli_stmt_bind_param($statment, "ss", $username, $password);

    // Utför frågan
    $result = mysqli_stmt_execute($statment);
   
    // Stäng statementet när vi är klara
    mysqli_stmt_close($statment);
    return $result;
}

function handle_user_profil($title, $presentation, $id)
{
    global $connection; // Så vi kommer åt den globala variabeln

    $sql = 'UPDATE user SET title=?, presentation=? WHERE id=?';
    $statment = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($statment, "ssi", $title, $presentation, $id);
    $result = mysqli_stmt_execute($statment);
    mysqli_stmt_close($statment);
    return $result;
}
function add_post($title, $content, $userId)
{
    global $connection; // Så vi kommer åt den globala variabeln

    $sql = 'INSERT INTO post (title, content, userId) VALUES (?,?,?)';
    $statment = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($statment, "ssi", $title, $content, $userId);
    $result = mysqli_stmt_execute($statment);
    mysqli_stmt_close($statment);
    return $result;
}
function add_image($filename, $description, $postId)
{
    global $connection; // Så vi kommer åt den globala variabeln

    $sql = 'INSERT INTO image (filename, description, postId) VALUES (?,?,?)';
    $statment = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($statment, "ssi", $filename, $description, $postId);
    $result = mysqli_stmt_execute($statment);
    mysqli_stmt_close($statment);
    return $result;
}
function get_post($id)
{
    global $connection;
    //$sql = 'SELECT * FROM post WHERE id=?';
    $sql ='SELECT 
    post.id AS id,
    post.title AS title, 
    post.content AS content, 
    post.created AS created, 
    post.userId AS userId, 
    image.filename AS filename
    FROM post
    LEFT JOIN image ON post.id = image.postId
    WHERE post.id=?';
    $statment = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($statment, "i", $id);
    mysqli_stmt_execute($statment);
    $result = get_result($statment);
    mysqli_stmt_close($statment);
    return $result;
}
function get_posts($userid) // Gets all posts from one user
{
    global $connection;
    //$sql = 'SELECT * FROM post WHERE userid=? ORDER BY created DESC';
    $sql ='SELECT 
    post.id AS id,
    post.title AS title, 
    post.content AS content, 
    post.created AS created, 
    post.userId AS userId, 
    image.filename AS filename
    FROM post
    LEFT JOIN image ON post.id = image.postId
    WHERE post.userId=?
    ORDER BY created DESC';
    $statment = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($statment, "i", $userid);
    mysqli_stmt_execute($statment);
    $result = get_result($statment);
    mysqli_stmt_close($statment);
    return $result;
}
function get_all_posts() // Gets all posts from all user
{
    global $connection;
    //$sql = 'SELECT * FROM post ORDER BY created DESC';
    //$sql ='SELECT post.*, (SELECT user.username FROM user WHERE user.id = post.userId) AS username FROM post ORDER BY created DESC';
    $sql = 'SELECT 
    post.title AS title, 
    post.content AS content, 
    post.created AS created, 
    post.userId AS userId, 
    user.username AS username,
    image.filename as filename
    FROM post 
    LEFT JOIN image ON post.id = image.postId 
    LEFT JOIN user ON post.userId = user.id 
    ORDER BY created DESC' ;
    $statment = mysqli_prepare($connection, $sql);
    mysqli_stmt_execute($statment);
    $result = get_result($statment);
    mysqli_stmt_close($statment);
    return $result;
}
function update_post($title, $content, $id)
{
    global $connection;
    $sql = 'UPDATE post SET title=?, content=? WHERE id=?';
    $statment = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($statment, "ssi", $title, $content, $id);
    $result = mysqli_stmt_execute($statment);
    mysqli_stmt_close($statment);
    return $result;
}
function delete_post($id)
{
    global $connection;
    $sql = 'DELETE FROM post WHERE id=?';
    $statment = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($statment, "i", $id);
    $result = mysqli_stmt_execute($statment);
    mysqli_stmt_close($statment);
    return $result;
}
function delete_image_post($postId)
{
    global $connection;
    $sql = 'DELETE FROM image WHERE postId=?';
    $statment = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($statment, "i", $postId);
    $result = mysqli_stmt_execute($statment);
    mysqli_stmt_close($statment);
    return $result;
}
function update_image_post($filename, $postId)
{
    global $connection;
    $sql = 'UPDATE image SET filename=? WHERE postId=?';
    $statment = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($statment, "si", $filename, $postId);
    $result = mysqli_stmt_execute($statment);
    mysqli_stmt_close($statment);
    return $result;
}

/**
 * Tar in ett statement som har körts, hämtar resultatet och lägger
 * resultatet i en array med rader där varje rad innehåller en array med fält
*/
function get_result($statment)
{
    $rows = array();
    $result = mysqli_stmt_get_result($statment);
    if($result) // Finns resultat
    {
        // Hämta rad för rad ur resultatet och lägg in i $row
        while ($row = mysqli_fetch_assoc($result))
        {
            $rows[] = $row;
        }
    }
    return $rows;
}

function get_users()
{
    global $connection;
    $sql = 'SELECT * FROM user';
    $statment = mysqli_prepare($connection, $sql);
    mysqli_stmt_execute($statment);
    $result = get_result($statment);
    mysqli_stmt_close($statment);
    return $result;
}

function get_user($username)
{
    global $connection;
    $sql = 'SELECT * FROM user WHERE username=?';
    $statment = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($statment, "s", $username);
    mysqli_stmt_execute($statment);
    $result = get_result($statment);
    mysqli_stmt_close($statment);
    return $result;
}

function get_password($id)
{
    global $connection;
    $sql = 'SELECT password FROM user WHERE id=?';
    $statment = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($statment, "s", $id);
    mysqli_stmt_execute($statment);
    $result = get_result($statment);
    mysqli_stmt_close($statment);
    return $result;
}

function get_images($id)
{
    global $connection;
    $sql = 'SELECT image.postId, image.filename, image.description FROM image JOIN post ON image.postId=post.id WHERE post.userId=?';
    $statment = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($statment, "i", $id);
    mysqli_stmt_execute($statment);
    $result = get_result($statment);
    mysqli_stmt_close($statment);
    return $result;
}

function change_avatar($filename, $id)
{
    global $connection;
    $sql = 'UPDATE user SET image=? WHERE id=?';
    $statment = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($statment, "si", $filename, $id);
    $result = mysqli_stmt_execute($statment);
    mysqli_stmt_close($statment);
    return $result;
}

/**
 * OBS! Kan ta bort alla tabeller ut databasen om så önskas
 *
 * Importerar databastabeller och innehåll i databasen från en .sql-fil
 * Använd MyPhpAdmin för att exportera din lokala databas till en .sql-fil
 *
 * @param $db
 * @param $filename
 * @param $dropOldTables - skicka in TRUE om alla tabeller som finns ska tas bort
 */
function import($filename, $dropOldTables=FALSE)
{
    global $connection;
    // Om $dropOldTables är TRUE så ska vi ta bort alla gamla tabeller
    if ($dropOldTables)
    {
        // Börjar med att hämta eventuella tabeller som finns i databasen
        $query = 'SHOW TABLES';
        $result = mysqli_query($connection, $query);
        // Om några tabeller hämtats
        if ($result)
        {
            // Hämta rad för rad ur resultatet
            while ($row = mysqli_fetch_row($result))
            {
                $query = 'DROP TABLE ' . $row[0];
                if (mysqli_query($connection, $query))
                    echo 'Tabellen <strong>' . $row[0] . '</strong> togs bort<br>';
            }
        }
    }
    $query = '';
    // Läs in filens innehåll
    $lines = file($filename);

    // Hantera en rad i taget
    foreach ($lines as $line) {
        // Gör inget med kommentarer eller tomma rader (gå till nästa rad)
        if (substr($line, 0, 2) == '--' || $line == '')
            continue;

        // Varje rad läggs till i frågan (query)
        $query .= $line;

        // Slutet på frågan är hittad om ett semikolon hittades i slutet av raden
        if (substr(trim($line), -1, 1) == ';') {
            // Kör frågan mot databasen
            if (!mysqli_query($connection, $query))
                echo "<br>Fel i frågan: <strong>$query</strong><br><br>";

            // Töm $query så vi kan starta med nästa fråga
            $query = '';
        }
    }
    echo 'Importeringen är klar!<br>';
}
