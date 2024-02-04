<?php
    $firstPage = "1";
    $lastPage = "6";
    $htmlPage = "5";
    $curentPage = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
    $curentPageNumber = substr($curentPage, 4, -4);
    $previus = "sida" . $curentPageNumber -1 . ".php";
    $next = "sida" . $curentPageNumber + 1 . ".php";
    if ($curentPageNumber == $htmlPage) {
        $next = "sida" . $curentPageNumber + 1 . ".html";
    }
?>

<nav class="pagination">
    <ul class="panination__list">
        <li>
            <?php 
                if($curentPageNumber == $firstPage) {
                echo "<span class=\"grayd-out previous\">&laquo; Föregående</span>";
                } else {
                    echo "<a class=\"previous\" href=" . $previus . ">&laquo; Föregående</a>";
                }
            ?>
        </li>
        <li>
            <span class="curent-page"><?php echo $curentPage ?></span>
        <li>
            <?php 
                if($curentPageNumber == $lastPage) {
                echo "<span class=\"grayd-out next\">Nästa &raquo;</span>";
                } else {
                    echo "<a class=\"next\" href=" . $next . ">Nästa &raquo;</a>";
                }
            ?>
        </li>
    </ul>
</nav>