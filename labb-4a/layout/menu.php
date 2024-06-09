
<h2 class="secondary-heading">Bloggare</h2>
<ul class="striped-list">
<?php
    $rows = get_users();
    //$rows = "";
    if (!empty($rows)) {
        foreach($rows as $user)
        {
            $name = $user['username']; // username är namnet på kolumnen i databastabellen
            $presentation = $user['presentation']; // XXXXXXXXXXX
            $userID = $user['id'];
            
            $print_presentation = "";
            if (!empty($presentation)) {
                $print_presentation = "
                        <span class='material-symbols-outlined info-icon'>
                            info
                        </span>
                        <div class='presentation-info'>
                            <h2>Pressentation</h2>
                            <p>Bloggare: $name</p>
                            $presentation 
                        <div>";
            }
            
            echo ("<li class='striped-list-item'>
                        <a href='index.php?getUserPost=$name&userId=$userID' class='menu-link'>
                            $name
                            <span class='material-symbols-outlined read-more'>
                                read_more
                            </span>
                        </a>
                        $print_presentation
                    </li>");
        }
    } else {
        echo "VISA EN BILD "; // todo!
    }
?>
</ul>