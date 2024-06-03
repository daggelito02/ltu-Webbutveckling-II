<?php
	session_start();
	if (!isset($_SESSION['logedIn']) || $_SESSION['logedIn'] != true){ // För att sätta ett värde till session-index(logedIn) om ej satt
		$_SESSION['logedIn'] = false;
        header("Location: ../../index.php");
		exit();
	} 
    require_once('../db.php');

    $user = get_user($_SESSION['userName']);
    $userId = $user['0']['id'];
    $title = "";
    $content = "";
    $Id = "";
    $adminInfo = "";
    $adminInfoPost = "";
    $error = "";
    $errorUpdate = "";
    $adminInfoPostUpdate = "";
    $imageName = "";
    $imageNameEdit = "";
    $showContent = "";
    $hideContent = "";
    $postTextTitel = "";
    $postArticle = "";
    $ifImage = "false";
    $selectedValue = "";
    $open = "";
    
    
    if (isset($_POST['selectPost']) or isset($_GET['imageNameEdit'])) { 
        echo "inne: " . $_GET['imageNameEdit'];
        if (isset($_POST['choose-post'])) { 
            echo $selectedValue = (int)$_POST['choose-post'];
        }
        if (isset($_GET['imageNameEdit'])) { 
            echo $selectedValue = (int)$_GET['imageNameEdit'];
        }
        if (isset($_GET['open'])){
            $open = $_GET['open'];
        }
        
        if (get_post($selectedValue)) {
            $thePost = get_post($selectedValue);
            $title = $thePost['0']['title'];
            $content = $thePost['0']['content'];
            $filename = $thePost['0']['filename'];
            if (isset($filename)) {
                $ifImage = "true";
            }
        }
    }

    if (isset($_GET['imageName'])) { 
        $imageName = $_GET['imageName'];
        $showContent = "show-content";
        $hideContent = "hide-content";
    } else {
        $showContent = "hide-content";
    }

    if (isset($_GET['imageNameEdit'])) { 
        $imageNameEdit = $_GET['theImageNameEdit'];
        $showContentEdit = "show-content";
        $hideContentEdit = "hide-content";
    } else {
        $showContentEdit = "hide-content";
    }

    if (isset($_GET['adminInfo'])) { 
        $adminInfo = $_GET['adminInfo'];
    }

    if (isset($_GET['adminInfoPost'])) { 
        $adminInfoPost = $_GET['adminInfoPost'];
    }

    if (isset($_GET['adminInfoPostUpdate'])) { 
        $adminInfoPostUpdate = $_GET['adminInfoPostUpdate'];
    }

    if (isset($_GET['error'])) { 
        $error = $_GET['error'];
    }

    if (isset($_GET['errorUpdate'])) { 
        $errorUpdate = $_GET['errorUpdate'];
    }
    


	include '../../includes/show_errors.php'; 
?>
<!doctype html>
<html lang="sv">
	<head>
	<meta charset="utf-8">
	<title>Dag Fredriksson Luleå Universitet</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
	<link rel="stylesheet" href="../../css/style.css">
	</head>
	<body>
		<header>
			<div class="nav-link-to-start-page">
				<div class="button-link">
					<span class="material-symbols-outlined double-arrow">
						double_arrow
					</span> 
					<a href="../../index.php">Startsidan</a> 
				</div>
			</div>
            <h1 class="heading">Väkommen <?php  echo $_SESSION['userName']; ?> till din adminsida :-)</h1>
            <div class="blogg-info-border">
                <div class="blogg-info">
                        <P>Här kan du redigera din profil eller skriva/ändra blogginkägg. Lycka till!</p>
                </div>
            </div>
		</header>
		<main class=user-admin-conatiner>
            <!-- User profile -->
            <div class="user-profile admin-container">
                <form action="handle_admin_data.php" method="post" class="user-profile-form" id="user-profile" >
					<h2>Hantera din profil</h2>
					<div class="form-container-user">
                        <p class="admin-info"><?=$adminInfo?></p>
						<div class="form-container__row">
							<input maxlength="30" class="full-width" type="text" name="profile" id="profile" placeholder="Lägg till eller ändra titel">
						</div>
						<div class="form-container__row">
                        <textarea maxlength="200" class="full-width" id="presentation" name="presentation" rows="4" 
                                  placeholder="Skriv en pressentation om dig själv (max 200 tecken)"></textarea>
						</div>
                        <div class="form-container__row">
                            <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                            <!-- <label class="button-upload" for="upload">Ladda upp en avatar-bild</label>
                            <input disabled id="upload" type="file" name="file_upload" value="test" accept="image/*" hidden/> -->
                        </div>
						<div class="form-container__row">
							<input class="button-admin" type="submit" value="Spara profil" name="updateProfile" id="update-profile">
						</div>
					</div>
				</form>
            </div>
            <!-- Add posts -->
            <div class="user-posts admin-container">
                <div class="user-profile-form">         
                    <form action="handle_admin_data.php" method="post" id="user-post" enctype="multipart/form-data">
                    <input type="hidden" id="imageName" name="imageName" value="<?=$imageName?>" />
                        <h2>Skapa ett inlägg</h2>
                        <p class="admin-info"><?=$adminInfoPost?></p>
                        <p class="errorMessage"><?=$error?></p>
                        <p class="file-text-info">Inlägg med bild? Förbered med att ladda upp bilden.</p>
                        <div class="form-container-add-post">
                            <div class="form-container__row">
                                <input class="full-width" maxlength="60" type="text" name="postTitle" id="postTitle" placeholder="Title (max 60 tecken)">
                            </div>
                            <div class="form-container__row">
                                <textarea class="full-width" id="content" name="content" rows="10" 
                                        placeholder="Skriv en bra post"></textarea>
                            </div>
                            <div class="form-container__row">
                                <input class="button-admin" type="submit" value="Spara inlägget" name="addUserPost" id="add-user-post">
                            </div>
                        </div>
                        <div class="upload-image-form">
                            
                            <div class="form-container__row buttons-row">
                                
                                <input class="<?=$hideContent?>" type="file" name="uploadImage" id="uploadImage" accept="image/*">
                                <p class="<?=$showContent?> file-text">Bilden "<?=$imageName?>"&nbsp;är nu redod!.</p>
                                <input class="button-admin <?=$hideContent?>" type="submit" value="Ladda upp bild" name="upload-file">
                                <input class="button-admin <?=$showContent?>" type="submit" value="Ångra" name="reset-upload">
                            </div>
                        </div>
                    </form>
                </div>    
            </div>
            <!-- Edit posts -->
            <div class="user-edit-posts admin-container">
                <div class="user-profile-form">
                    <!-- Select för att hämta ett inlägg -->
                    <form action="user_admin.php" method="post" class="" id="choose-form" >
                        <h2>Redigera ett inlägg</h2>
                        <p class="admin-info"><?=$adminInfoPostUpdate?></p>
                        <p class="errorMessage"><?=$errorUpdate?></p>
                        <div class="form-container__row buttons-row">
                            <label class="form-label" for="choose-post">Välj ett inlägg:</label>
                            <select class="choose-post" name="choose-post" id="choose-post" form="choose-form">
                                <option value='choosePost'>Välj inlägg</option>
                                <?php
                                    if (get_posts($userId)) {
                                        $rows = get_posts($userId);
                                        if(!empty($rows)){
                                            foreach($rows as $thePosts) { 
                                                $titleOption = $thePosts['title'];
                                                $idOption = $thePosts['id'];
                                                echo ("
                                                    <option value='$idOption'>$titleOption</option>
                                                ");
                                            }
                                        }
                                    }
                                ?>
                            </select>
                            <input class="button-admin" type="submit" value="Visa inlägget" name="selectPost" id="select-post">
                        </div>
                    </form>
                    <!-- Redigera det valda inlägget -->
                    <form action="handle_admin_data.php" method="post" class="" id="user-edit-post" enctype="multipart/form-data">
                        <input type="hidden" id="postIdEdit" name="postIdEdit" value="<?=$selectedValue?>" />
                        <input type="hidden" id="imageNameEdit" name="imageNameEdit" value="<?=$imageNameEdit?>" />
                        <input type="hidden" id="changeImage" name="changeImage" value="true" />
                        <div class="form-container-add-post">
                            <div class="form-container__row">
                                <input class="full-width" maxlength="60" type="text" name="postTitle" id="postTitle" value="<?=$title?>">
                            </div>
                            <?php
                                if (isset($filename)) { 
                                    $imgUrl =  "../../uploads/" . $filename; 
                            ?>
                                <input type="checkbox" id="open-close" name="toggle" <?=$open?> >
                                <div class="label-toggle">
                                    <div id="open">
                                        <div class="button-link">
                                            <label for="open-close">Redigera bilden</label>
                                            <span class="material-symbols-outlined double-arrow">
                                                double_arrow
                                            </span>
                                        </div>
                                        <span><?=$filename?></span>
                                    </div>
                                    <div id="close">
                                        <div class="button-link">
                                            <label for="open-close">Stäng bild dialog</label>
                                            <span class="material-symbols-outlined double-arrow">
                                                double_arrow
                                            </span>
                                        </div>
                                        <span><?=$filename?></span>
                                    </div>
                                </div>
                                <div class="img-in-post-container">
                                    <div class="img-in-post">
                                        <img src="<?=$imgUrl?>" alt="post picture" class="img-width">
                                    </div>
                                    <!--  -->
                                    <div class="form-container__row buttons-row">
                                        <input class="<?=$hideContentEdit?>" type="file" name="uploadImage" id="uploadImage" accept="image/*">
                                        <p class="<?=$showContentEdit?> file-text">Bilden "<?=$imageNameEdit?>"&nbsp;kan nu bytas!.</p>
                                        <input class="button-admin <?=$hideContentEdit?>" type="submit" value="Ladda upp ny bild" name="upload-file">
                                        <input class="button-admin <?=$showContentEdit?>" type="submit" value="Ångra" name="reset-upload">
                                    </div>
                                </div>
                            <?php
                                }
                            ?>

                            <div class="form-container__row">
                            <textarea class="full-width" 
                                id="content" 
                                name="content" 
                                rows="10"><?php echo $content; ?>
                            </textarea>
                            </div>
                            <div class="form-container__row buttons-row">
                                <input class="button-admin" type="submit" value="Uppdatera" name="editUserPost" id="edit-user-post">
                                <input type="hidden" id="if-image" name="ifImage" value="<?=$ifImage?>" />
                                <input type="hidden" id="post-id-delete" name="postIdDelete" value="<?=$selectedValue?>" />
                                <input class="button-admin" id="delete-post" type="submit" value="Ta bort inlägget" name="deletePost">
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
		</main>
		<footer>
			<?php require_once '../../layout/footer.php'; ?>
		</footer>
    </body>
</html>