<?php
	session_start();
	if (!isset($_SESSION['logedIn']) || $_SESSION['logedIn'] != true){ // För att sätta ett värde till session-index(logedIn) om ej satt
		$_SESSION['logedIn'] = false;
        header("Location: ../../index.php");
		exit();
	}
    require_once('../db.php');
    include '../../includes/show_errors.php';
    // update/add profile
    if (isset($_POST['updateProfile'])) { 
        
        $user = get_user($_SESSION['userName']);
        $id = $user['0']['id'];
        $title = $_POST['profile'];
        $presentation = $_POST['presentation'];
        $update = true;

        if (empty($title) && empty($presentation)) {
            $update = false; 
            header('Location: ./user_admin.php');
        }

        if (empty($title)) {
            $title = $user['0']['title'];
        }

        if (empty($presentation)) {
            $presentation = $user['0']['presentation'];
        }

        if ($update) {
            if (handle_user_profil($title, $presentation, $id)) {
                header('Location: ./user_admin.php?adminInfo=Din profil är uppdaterad!');
                echo "här";
            } else {
                header('Location: ./user_admin.php?error=Något har går fel! Försök ingen.');
            }
        }
    }

    // upload image
    if (isset($_POST['reset-upload'])) {
        header('Location: ./user_admin.php');
    } else if (isset($_POST['undo-upload'])) {
        if(isset($_POST['postIdEdit'])){
            $postIdNumber = $_POST['postIdEdit'];
        }
        header('Location: ./user_admin.php?imageNameEdit=' . $postIdNumber . '&open=checked&undo=true&theImageNameEdit='. htmlspecialchars(basename($_FILES["uploadImage"]["name"])));
    }
    else {
        include 'includes/up_img.php';
    }

    // add a post
    if (isset($_POST['addUserPost'])) { //

        if(empty(!$_POST['postTitle']) || empty(!$_POST['content'])) {
            echo "Post tilllagd!"; 
            echo "<br>";
            print_r($_POST['postTitle']);
            echo "<br>";
            print_r($_POST['content']);
        
            $user = get_user($_SESSION['userName']);
            $userId = $user['0']['id'];
            $title = htmlspecialchars($_POST['postTitle'], ENT_QUOTES, 'UTF-8');
            $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');

            if (add_post($title, $content, $userId)) {
                $thePost = get_posts($userId);
                echo "Posts id: " . $thePost['0']['id'];
                if (isset($_POST['imageName'])) { 
                    echo $filename = $_POST['imageName'];
                    echo "<br>";
                    $description = "";
                    echo $postId = (int)$thePost['0']['id'];
                    echo "<br>";

                    if (add_image($filename, $description, $postId)){
                        // do nothing.
                    } else {
                        header('Location: ./user_admin.php?error=Något har går fel! Försök ingen.');
                    }
                }

                header('Location: ./user_admin.php?adminInfoPost=Ditt blogginlägg skapat!');
                
            } else {
                header('Location: ./user_admin.php?error=Något har går fel! Försök ingen.');
            }

        }  else {
            header('Location: ./user_admin.php?error=Både Titel och artikletext bör finnas.');
        }
    }    

    // Edit and update post
    if (isset($_POST['editUserPost'])) { //

        if(!empty($_POST['postTitle']) && !empty($_POST['content'])) {
            echo $id = (int)$_POST['postIdEdit'];
            echo $postId = $id; 
            $title = htmlspecialchars($_POST['postTitle'], ENT_QUOTES, 'UTF-8');
            $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');

            if(!empty($_POST['imageNameEdit'])) {
                echo 'imageNameEdit: ' . ($_POST['imageNameEdit']);

                $filename =$_POST['imageNameEdit'];
                if(update_image_post($filename, $postId)) {
                    // do nothing
                } else {
                    header('Location: ./user_admin.php?errorUpdate=Något har går fel! Försök ingen.');
                }
            } 
            if (update_post($title, $content, $id)) {
                header('Location: ./user_admin.php?imageNameEdit=' . $id . '&adminInfoPostUpdate=Ditt blogginlägg har uppdaterats!&open=checked&undo=true&theImageNameEdit='. htmlspecialchars(basename($_FILES["uploadImage"]["name"])));
            } else {
                header('Location: ./user_admin.php?errorUpdate=Något har går fel! Försök ingen.');
            }
        }  else {
            header('Location: ./user_admin.php?errorUpdate=Både Titel och artikletext bör finnas!');
        }
    } 
    // delet post
    if (isset($_POST['deletePost'])) { 
        if (!empty($_POST['postIdDelete'])) {
            echo "In tec deleted!<br>"; 
            echo $ifImage = $_POST['ifImage'];
            echo $id = (int)$_POST['postIdDelete'];
            echo $postId = (int)$_POST['postIdDelete'];

            if ($ifImage == "true") {
                echo "ifImage: " .$ifImage;
                if (delete_image_post($postId)) { 
                    if (delete_post($id)) {
                        header('Location: ./user_admin.php?adminInfoPostUpdate=Ditt blogginlägg är borttaget!');
                        echo "<br>Post deleted!<br>";
                    } else {
                        header('Location: ./user_admin.php?errorUpdate=Något har går fel! Försök ingen.');
                        echo "<br>Post not deleted!<br>";
                    }
                    echo "<br>Image deleted!<br>";
                } else {
                    echo "<br>Image not deleted!<br>";
                    header('Location: ./user_admin.php?errorUpdate=Något har går fel! Försök ingen.');
                }
            } else if ($ifImage == "false") {
                echo "<br>ifImage: " .$ifImage;
                if (delete_post($id)) {
                    header('Location: ./user_admin.php?adminInfoPostUpdate=Ditt blogginlägg är borttaget!');
                } else {
                    header('Location: ./user_admin.php?errorUpdate=Något har går fel! Försök ingen.');
                }
            }
        } else {
            header('Location: ./user_admin.php?errorUpdate=Välj ett inlägg!');
        }
    } 

    // 
?>