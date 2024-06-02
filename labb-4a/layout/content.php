<ul class="striped-list post-list">
<?php
    if (isset($_GET['getUserPost'])) { 
        if (isset($_GET['userId'])) { 
            $userName = $_GET['getUserPost'];
            $userId = (int)$_GET['userId'];
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
                    $filename = $thePosts['filename'];
                    //$thePostId = $thePosts['id'];
                    //$userId = (int)$thePosts['userId'];
    
                    // $imgage = get_images($userId);
                    // if(!empty($imgage['0']['postId'])){
                    //     $postId = $imgage['0']['postId'];
                    // } else {
                    //     $postId = "";
                    // }
    
                    echo ("
                        <li class='striped-list-item posts'>
                            <div class='row'>
                                <h3 class='title'>
                                    $title
                                </h3>
                                <time datetime='$created'>$created</time>
                            </div>
                    ");
                    echo ("<div class='row'>");
                        if($filename) {
                            $imgUrl =  "./uploads/" . $filename;
                            echo ("<div class='img-container'><img src='$imgUrl' alt='post picture' class='img-width'></div>");
                        }
                        echo ("<div>");
                        echo nl2br("<p>$content</p>"); // På en rad fär att bara få tu linebrakes i texten
                        echo ("
                            <p class='blog-writer'>$userName</p>
                        </li>
                        ");
                        echo ("</div>");
                    echo ("</div>");
                echo ("</li>");
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

        $rows = get_all_posts();

        if(!empty($rows)){
            
            foreach($rows as $thePosts) {
                $title = $thePosts['title'];
                $content = $thePosts['content'];
                $created = $thePosts['created'];
                $userName = $thePosts['username'];
                $filename = $thePosts['filename'];
                
                echo ("
                    <li class='striped-list-item posts'>
                        <div class='row'>
                            <h3 class='title'>
                                $title
                            </h3>
                            <time datetime='$created'>$created</time>
                        </div>
                ");
                    echo ("<div class='row'>");
                        if($filename) {
                            $imgUrl =  "./uploads/" . $filename;
                            echo ("<div class='img-container'><img src='$imgUrl' alt='post picture' class='img-width'></div>");
                        }
                        echo ("<div>");
                        echo nl2br("<p>$content</p>"); // På en rad fär att bara få tu linebrakes i texten
                        echo ("
                            <p class='blog-writer'>$userName</p>
                        </li>
                        ");
                        echo ("</div>");
                    echo ("</div>");
                echo ("</li>");
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