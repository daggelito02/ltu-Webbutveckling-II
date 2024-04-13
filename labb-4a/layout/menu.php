<?php
    $rows = get_users();
    foreach($rows as $user)
    {
        $name = $user['username']; // username är namnet på kolumnen i databastabellen
        $pass = $user['password']; // password är namnet på kolumnen i databastabellen
        echo ("<p>$name - $pass</p>");
    }
?>
<!-- <p>Länklista för Labb 1a - PHP-sidor</p>
<ul>
    <li>
    <span class="material-symbols-outlined green">check_box</span>
    <a href="ltu-Webbutveckling-II/labb-1a/sida1.php">
    Strängar &raquo;
    </a>
    </li>
    <li>
    <span class="material-symbols-outlined green">check_box</span>
    <a href="ltu-Webbutveckling-II/labb-1a/sida2.php">
    Arrayer &raquo;
    </a>
    </li>
    <li>
    <span class="material-symbols-outlined green">check_box</span>
    <a href="ltu-Webbutveckling-II/labb-1a/sida3.php">
    Loopar och villkorssatser &raquo;
    </a>
    </li>
    <li>
    <span class="material-symbols-outlined green">check_box</span>
    <a href="ltu-Webbutveckling-II/labb-1a/sida4.php">
    Funktioner &raquo;
    </a>
    </li>
    <li>
    <span class="material-symbols-outlined green">check_box</span>
    <a href="ltu-Webbutveckling-II/labb-1a/sida5.php">
    Servervariabler &raquo;
    </a>
    </li>
    <li>
    <span class="material-symbols-outlined green">check_box</span>
    <a href="ltu-Webbutveckling-II/labb-1a/sida6.html">
        Meddelandehantering &raquo;
    </a>
    </li>
</ul>
<p>Länklista för Labb 2a - PHP-sidor</p>
<ul>
    <li>
    <span class="material-symbols-outlined green">check_box</span>
    <a href="ltu-Webbutveckling-II/labb-2a/login.php">
    login &raquo;
    </a>
    </li>
    <li>
    <span class="material-symbols-outlined green">check_box</span>
    <a href="ltu-Webbutveckling-II/labb-2a/index.php">
    index &raquo;
    </a>
    </li>
</ul>
<p>Länklista för Labb 3a - Enkla Javascript-sidor</p>
<ul>
    <li>
    <span class="material-symbols-outlined green">check_box</span>
    <a href="ltu-Webbutveckling-II/labb-3a/task_one.html">
        Koduppgift ett &raquo;
    </a>
    </li>
    <li>
    <span class="material-symbols-outlined green">check_box</span>
    <a href="ltu-Webbutveckling-II/labb-3a/task_two.html">
        Koduppgift två &raquo;
    </a>
    </li>
    <li>
    <span class="material-symbols-outlined green">check_box</span>
    <a href="ltu-Webbutveckling-II/labb-3a/task_three.html">
        Koduppgift tre &raquo;
    </a>
    </li>
</ul>
<p>Länklista för Labb 4a - Utveckla en blogg</p>
<ul>
    <li>
    <span class="material-symbols-outlined">check_box</span>
    <a href="ltu-Webbutveckling-II/labb-4a/index.php">
        El bloggo &raquo;
    </a>
    </li>
</ul> -->