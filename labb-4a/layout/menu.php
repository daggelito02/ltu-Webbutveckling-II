
<h2 class="secondary-heading">Bloggare</h2>
<ul class="menu-list">
<?php
    $rows = get_users();
    foreach($rows as $user)
    {
        $name = $user['username']; // username är namnet på kolumnen i databastabellen
        //$pass = $user['password']; // password är namnet på kolumnen i databastabellen
        echo ("<li class='menu-list-item'>
                    <span class='material-symbols-outlined list-bulleted'>
                        format_list_bulleted
                    </span>
                    <a href='index.php' class='menu-link'>$name</a>
                    <span class='material-symbols-outlined read-more'>
                        read_more
                    </span>
                </li>");
    }
?>
</ul>