<?php
	session_start();
	if (!isset($_SESSION['logedIn']) || $_SESSION['logedIn'] != true){ // För att sätta ett värde till session-index(logedIn) om ej satt
		$_SESSION['logedIn'] = false;
        header("Location: ../../index.php");
		exit();
	}
    require_once('../db.php');
    include '../../includes/show_errors.php'; //Visar felmedelanden

    // Update/add profile
    if (isset($_POST['updateProfile'])) { 
        
        $user = get_user($_SESSION['userName']);
        $id = $user['0']['id'];
        $title = $_POST['profile'];
        $presentation = $_POST['presentation'];
        $update = true;

        // Titel och presentation får inte vara tom
        if (empty($title) && empty($presentation)) {
            $update = false; 
            header('Location: ./user_admin.php');
        }

        // Om titel är tom sätts föregående titel (om finns)
        if (empty($title)) {
            $title = $user['0']['title'];
        }

        // Om presentation är tom sätts föregående presentation (om finns)
        if (empty($presentation)) {
            $presentation = $user['0']['presentation'];
        }

        // Uppdatera inlägg
        if ($update) {
            if (handle_user_profil($title, $presentation, $id)) {
                // Retunerar statustext
                header('Location: ./user_admin.php?adminInfo=Din profil är uppdaterad!');
            } else {
                // Retunerar felmedelande
                header('Location: ./user_admin.php?error=Något har går fel! Försök ingen.');
            }
        }
    }

    // Upload image handeling
    if (isset($_POST['reset-upload'])) {
        // Laddar om adminsidan
        header('Location: ./user_admin.php');
    } else if (isset($_POST['undo-upload'])) {
        if(isset($_POST['postIdEdit'])){ // Hämtar inläggets ID
            $postIdNumber = $_POST['postIdEdit'];
        }
        // Laddar om adminsidan med rätt inlägg
        header('Location: ./user_admin.php?imageNameEdit=' . $postIdNumber . '&open=checked&undo=true');
    }
    else {
        include 'includes/up_img.php'; // Hanterar uppladdnning av bild
    }

    // Add a post
    if (isset($_POST['addUserPost'])) { //
        // Om både titel och innehållstext finns
        if(empty(!$_POST['postTitle']) && empty(!$_POST['content'])) {
        
            $user = get_user($_SESSION['userName']); // Hämtar anvädare
            $userId = $user['0']['id']; // Hämtar anvandar Id:et
            $title = htmlspecialchars($_POST['postTitle'], ENT_QUOTES, 'UTF-8'); // Hämtar titel terxten
            $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8'); // Hämtar innehålls terxten

            // Lägg till posten
            if (add_post($title, $content, $userId)) {
                $thePost = get_posts($userId); // Hämtar inläggets ID 
                // Lägger till en bild om namnet ät postat
                if (!empty($_POST['imageName'])) { 
                    $filename = $_POST['imageName'];
                    $description = "";
                    $postId = (int)$thePost['0']['id']; // Ser till att inläggets ID är av typen nummer

                    if (add_image($filename, $description, $postId)){
                        // do nothing.
                    } else {
                        // Retunerar felmedelande
                        header('Location: ./user_admin.php?error=Något har går fel! Försök ingen.');
                    }
                }
                // Retunerar Status information
                header('Location: ./user_admin.php?adminInfoPost=Ditt blogginlägg skapat!');
                
            } else {
                // Retunerar felmedelande
                header('Location: ./user_admin.php?error=Något har går fel! Försök ingen.');
            }

        }  else {
            // Retunerar felmedelande
            header('Location: ./user_admin.php?error=Både Titel och artikletext bör finnas.');
        }
    }    

    // Edit and update post
    if (isset($_POST['editUserPost'])) { //

        if(!empty($_POST['postTitle']) && !empty($_POST['content'])) {
            $id = (int)$_POST['postIdEdit']; // Hämtar det postade Id:et
            $postId = $id; // Spar om i ny variable för att vara namn-konsekvent :-)
            $title = htmlspecialchars($_POST['postTitle'], ENT_QUOTES, 'UTF-8'); // Häntar titeltext
            $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8'); // Häntar inläggstext

            // Lägg till bild till befintligt inlägg
            if (!empty($_POST['addImageEdit'])) {
                if(!empty($_POST['imageNameEdit'])) { // Om bildnamn finns
 
                    $description = "";
                    $filename =$_POST['imageNameEdit']; // Hämtar bildfilens namn
                    if(add_image($filename, $description, $postId)) {
                        // do nothing
                    } else {
                        // Retunerar felmedelande till adminsidan
                        header('Location: ./user_admin.php?errorUpdate=Något har går fel! Försök ingen.');
                    }
                }
            // Byt befintlig bild till befintligt inlägg
            } else {
                if(!empty($_POST['imageNameEdit'])) { // Om bildnamn finns

                    $filename =$_POST['imageNameEdit']; // Hämtar bildmnmnet
                    if(update_image_post($filename, $postId)) {
                        // do nothing
                    } else {
                        // Retunerar felmedelande till adminsidan
                        header('Location: ./user_admin.php?errorUpdate=Något har går fel! Försök ingen.');
                    }
                }
            }
            // Updatera inlägget
            if (update_post($title, $content, $id)) {
                // Retunerar status information
                header('Location: ./user_admin.php?imageNameEdit=' . $id . '&adminInfoPostUpdate=Ditt blogginlägg har uppdaterats!&open=checked&undo=true#anchor-edit-post');
            } else {
                // Retunerar felmedelande
                header('Location: ./user_admin.php?errorUpdate=Något har går fel! Försök ingen.');
            }
        }  else {
            // Retunerar felmedelande
            header('Location: ./user_admin.php?errorUpdate=Något har går fel! Försök ingen.');
        }
    } 

    // Ta bort bild från befintligt inlägg
    if(!empty($_POST['delete-image'])) {
        $postId = (int)$_POST['postIdEdit']; // Hämtar det postade Id:et
        $title = htmlspecialchars($_POST['postTitle'], ENT_QUOTES, 'UTF-8'); // Häntar titeltext
        $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8'); // Häntar inläggstext

        if (delete_image_post($postId)) { 
            // Retunerar status information
            header('Location: ./user_admin.php?imageNameEdit=' . $postId . '&adminInfoPostUpdate=Bilden är bortagen!&open=checked&undo=true');
        } else {
            // Retunerar felmedelande
            header('Location: ./user_admin.php?errorUpdate=Något har går fel! Försök ingen.');
        }
    } 

    // Radera inlägget
    if (isset($_POST['deletePost'])) { 
        // Hämtar inläggets ID
        if (!empty($_POST['postIdDelete'])) {
            $ifImage = $_POST['ifImage']; // Kollar om inlägget har en bild
            $id = (int)$_POST['postIdDelete']; // Ser till att Id:et är av typen nummer
            $postId = (int)$_POST['postIdDelete']; // Hämtar inläggets ID

            // Kollar om det finns en bild i inlägget
            if ($ifImage == "true") {
                // 
                if (delete_image_post($postId)) { // Tar först bort bilddata ur image-tabellen 
                    if (delete_post($id)) { // Tar bort inlägget nu när kopplingen till imagetabellen är borta
                        // Retunerar status information
                        header('Location: ./user_admin.php?adminInfoPostUpdate=Ditt blogginlägg är borttaget!');
                    } else {
                        // Retunerar felmedelande
                        header('Location: ./user_admin.php?errorUpdate=Något har går fel! Försök ingen.');
                    }
                } else {
                    // Retunerar status information
                    header('Location: ./user_admin.php?errorUpdate=Något har går fel! Försök ingen.');
                }
            // Om inlägget inte har en bild
            } else if ($ifImage == "false") {
                if (delete_post($id)) { // Tar bort inlägget
                    // Retunerar status information
                    header('Location: ./user_admin.php?adminInfoPostUpdate=Ditt blogginlägg är borttaget!');
                } else {
                    // Retunerar felmedelande
                    header('Location: ./user_admin.php?errorUpdate=Något har går fel! Försök ingen.');
                }
            }
        } else {
            // Retunerar felmedelande
            header('Location: ./user_admin.php?errorUpdate=Välj ett inlägg!');
        }
    }
?>