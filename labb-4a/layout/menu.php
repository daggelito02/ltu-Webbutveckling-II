
<h2 class="secondary-heading">Bloggare</h2>
<ul class="striped-list">
<?php
    $rows = get_users();
    if (!empty($rows)) {
        foreach($rows as $user)
        {
            $name = $user['username']; 
            $presentation = $user['presentation']; 
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
            $urlenccodeName = urlencode($name);
            echo ("<li class='striped-list-item'>
                        <a href='index.php?getUserPost=$urlenccodeName&userId=$userID' class='menu-link'>
                            $name
                            <span class='material-symbols-outlined read-more'>
                                read_more
                            </span>
                        </a>
                        $print_presentation
                    </li>");
        }
    }
?>
</ul>