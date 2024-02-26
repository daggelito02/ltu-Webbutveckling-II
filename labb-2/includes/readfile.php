<?php
echo 'Read file <br>';
// $handle = fopen("login.txt", "rb");
// while( !feof ($handle) )
// {
//     $text = fgetcsv($handle,300,"\t","\n");
//     //$text = rtrim($text, PHP_EOL); 
//     //echo $text, "<br />";
//     print_r($text);
    
// }
// print_r(get_books());
// //print_r($text);
// function file_open(){
//     $handle = fopen("login.txt", "rb");
//     if (!$handle)
//         return false;
//     return $handle;
// }
// function get_books() {
//     $handle = file_open();
//     echo "<table>";
//     while($book_info = fgetcsv($handle,300,"\t","\n"))
//     {
//         list($book_name, $book_author, $book_isbn) = $book_info;
//         echo "<tr><td>";
//         echo "<img src='images/",   $book_isbn, ".jpg' />";
//         echo "</td><td>";   
//         echo "<b>Name: </b>",       $book_name,
//               "<br><b>Author: </b>", $book_author,
//               "<br><b>ISBN: </b>",   $book_isbn,
//               "<br></td></tr>";   
//     }
//     echo '</table>';
// }
//fclose($handle);

error_reporting ( E_ALL );
ini_set ( 'display_errors', 1 );

// $lines = file('login.txt', FILE_IGNORE_NEW_LINES);
// foreach ( $lines as $line ) {
//     //$data = explode("=", $line);
//     //echo $user."<br>";
//     parse_str($line, $output);
//     // $hej = $output['password'];
//     //  $hej;
//     // echo '<pre>';
//     // echo $output['user'];
//     // echo '</pre>';

//     if($output['user'] == "Dagge") {
//         echo $output['password'];
//     }
//     //$varName = $data[0];
//     //echo $$varName = $data[1];
// }

//echo $user;
// parse_str("My Value=Something");
// echo $My_Value; // Something

// parse_str("user=Something&test=bajs&user=helj&test=scs", $output);
// echo $output['test'][0]; // Something
// print_r($output);

// $handle = fopen("test-file.txt", "x+");
// $handle = fopen("test-file.txt", "rb");
// while( !feof ($handle) )
// {
//     $text = fgets($handle);
//     echo $text, "<br />";
// }
// fclose($handle);
$myfile = fopen("test.txt", "a") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);

?>