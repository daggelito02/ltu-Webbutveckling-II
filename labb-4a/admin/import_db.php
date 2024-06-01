<?php 
require_once('db_credentials.php'); 
require_once('./db.php');

$dropOldTables = "";

if (isset($_POST['import-db'])){  // När användare är utloggad
    $filename = "./cms.sql";
    //$dropOldTables = TRUE;
    //import($filename);
    import($filename, $dropOldTables);
    echo "Importera!";
} 

?>
<!doctype html>
<html lang="sv">
	<head>
	<meta charset="utf-8">
	<title>Dag Fredriksson Luleå Universitet</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
	<link rel="stylesheet" href="../../css/style.css">
	</head>
	<body>
        <form action="import_db.php" method="post" id="import-db">
            <div>
                <input type="submit" value="Importera db data" name="import-db">
            </div>
        </form>
    </body>
<html>