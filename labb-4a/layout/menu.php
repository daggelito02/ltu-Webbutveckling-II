
<h2 class="secondary-heading">Bloggare</h2>
<ul class="menu-list">
<?php
    $rows = get_users();
    foreach($rows as $user)
    {
        $name = $user['username']; // username är namnet på kolumnen i databastabellen
        $presentation = $user['presentation']; // XXXXXXXXXXX
        
        $print_presentation = "";
        if (!empty($presentation)) {
            $print_presentation = "
                    <span class='material-symbols-outlined info-icon'>
                        info
                    </span>
                    <div class='presentation-info'>
                        <h2>Pressentation</h2>
                        <p>Lite om mig: $name</p>
                        $presentation 
                    <div>";
        }

        echo ("<li class='menu-list-item'>
                    <span class='material-symbols-outlined list-bulleted'>
                        format_list_bulleted
                    </span>
                    <a href='index.php' class='menu-link'>$name</a>
                    <span class='material-symbols-outlined read-more'>
                        read_more
                    </span>
                    $print_presentation
                </li>");
    }
?>
</ul>