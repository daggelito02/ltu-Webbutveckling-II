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
    $showContent = "";
    $hideContent = "";
    $postTextTitel = "";
    $postArticle = "";

    if (isset($_POST['selectPost'])) { 
        
        if (isset($_POST['choose-post'])) { 
            $selectedValue = (int)$_POST['choose-post'];
        }
        
        if (get_post($selectedValue)) {
            // echo "<pre>";
            // print_r(get_post($Id));
            // // var_dump($thePost);
            // echo "</pre>";
            $thePost = get_post($selectedValue);
            $title = $thePost['0']['title'];
            $content = $thePost['0']['content'];
        }
    }

    // if (isset($_POST['postTextTitel'])) {
    //     echo $postTextTitel = $_POST['postTextTitel'];
    // }
    // if (isset($_POST['selectPost'])) {
    //     echo $postArticle = $_POST['postArticle'];
    // }

    if (isset($_GET['imageName'])) { 
        $imageName = $_GET['imageName'];
        $showContent = "show-content";
        $hideContent = "hide-content";
    } else {
        $showContent = "hide-content";
    }

    if (isset($_GET['adminInfo'])) { 
        $adminInfo = $_GET['adminInfo'];
    }

    if (isset($_GET['adminInfoPost'])) { 
        $adminInfoPost = $_GET['adminInfoPost'];
    }

    if (isset($_GET['adminInfoPostUpdate'])) { 
       echo $adminInfoPostUpdate = $_GET['adminInfoPostUpdate'];
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
                            <label class="button-upload" for="upload">Ladda upp en avatar-bild</label>
                            <input disabled id="upload" type="file" name="file_upload" value="test" accept="image/*" hidden/>
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
                        <p class="file-text-info">Inlägg med bild? Börja med att ladda upp bilden först.</p>
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
                            
                            <div class="form-container__row choose-post__row">
                                
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
                    <form action="user_admin.php" method="post" class="" id="choose-form" >
                        <h2>Redigera ett inlägg</h2>
                        <p class="admin-info"><?=$adminInfoPostUpdate?></p>
                        <p class="errorMessage"><?=$errorUpdate?></p>
                        <div class="form-container__row choose-post__row">
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
                    <form action="handle_admin_data.php" method="post" class="" id="user-edit-post" >
                        <input type="hidden" id="postId" name="postId" value="<?=$selectedValue?>" />
                        <div class="form-container-add-post">
                            <div class="form-container__row">
                                <input class="full-width" maxlength="60" type="text" name="postTitle" id="postTitle" value="<?=$title?>">
                            </div>
                            <div class="form-container__row">
                            <textarea class="full-width" 
                                id="content" 
                                name="content" 
                                rows="10"><?php echo $content; ?>
                            </textarea>
                            </div>
                            <div class="form-container__row">
                                <input class="button-admin" type="submit" value="Redigera inlägget" name="editUserPost" id="edit-user-post">
                            </div>
                        </div> 
                    </form>
                    <form action="handle_admin_data.php" method="post" class="" id="delet-form" >
                        <div class="form-container__row">
                            <input type="hidden" id="postIdDelete" name="postIdDelete" value="<?=$selectedValue?>" />
                            <input class="button-admin" type="submit" value="Ta bort inlägget" name="deletePost" id="delete-post">
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