<ul class="striped-list post-list">
<?php
    if (isset($_GET['getUserPost'])) { 
        if (isset($_GET['userId'])) { 
            $userName = $_GET['getUserPost'];
            $userId = (int)$_GET['userId'];
            //get_posts($userId);
            // echo "<pre>";
            //     print_r(get_all_posts());
            // echo "</pre>";
            
            //var_dump($rows);

            $bloggare = $userName . "s";
            echo ("
                <h2>Bloggare $bloggare inlägg</h2>
            ");

            $rows = get_posts($userId);
            if(!empty($rows)){
                foreach($rows as $thePosts) {
                    $title = $thePosts['title'];
                    $content = $thePosts['content'];
                    $created = $thePosts['created'];
    
                    echo ("
                        <li class='striped-list-item posts'>
                            <div class='row'>
                                <h3 class='title'>
                                    $title
                                </h3>
                                <time datetime='$created'>$created</time>
                            </div>
                    ");
                    echo nl2br("<p>$content</p>"); // På en rad fär att bara få tu linebrakes i texten
                    echo ("
                        <p class='blog-writer'>$userName</p>
                    </li>
                    ");
                }
            } else {
                echo ("
                    <li class='striped-list-item posts'>
                        <p>
                            $userName har inte skrivit några poster än :-)
                        </p>
                    </li>"
                );
            }
        }
    } else {
        echo ("
            <h2>Alla bloggares inlägg</h2>
        ");


       // SELECT post.*, (SELECT user.username FROM user WHERE user.id = post.userId) AS username FROM post ORDER BY created DESC;
        $rows = get_all_posts();
        if(!empty($rows)){
            
            foreach($rows as $thePosts) {
                $title = $thePosts['title'];
                $content = $thePosts['content'];
                $created = $thePosts['created'];
                $username = $thePosts['username'];

                echo ("
                    <li class='striped-list-item posts'>
                        <div class='row'>
                            <h3 class='title'>
                                $title
                            </h3>
                            <time datetime='$created'>$created</time>
                        </div>
                ");
                echo nl2br("<p>$content</p>"); // På en rad fär att bara få tu linebrakes i texten
                echo ("
                    <p class='blog-writer'>$username</p>
                </li>
                ");
            }
        } else {
            echo ("
                <li class='striped-list-item posts'>
                    <p>Inga inlägg har skapats än.</p>
                    <p>Skapa ett login-konto för att komma igång. Klicka på loginknappen uppe till höger.</p>
                </li>"
            );
        }
    } 
?>
</ul>