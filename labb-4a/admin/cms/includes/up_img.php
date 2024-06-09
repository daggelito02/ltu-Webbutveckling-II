<?php
if (isset($_POST["upload-file"])) {

    // Hämtar filens namn
    if(!empty($_FILES["uploadImage"]['name'])) {
        $uploadImageName = $_FILES["uploadImage"]['name'];
    }

    // Kollar villket innlägg som postats
    if(!empty($_POST['postIdEdit'])) {
        $postIdEdit = "?imageNameEdit=" . $_POST['postIdEdit'];
    }

    // Hanterar uppladdning av bild
    if ($_FILES["uploadImage"]['name']) {
        $target_dir = "../../uploads/"; // Mapp där bild sparas
        $target_file = $target_dir . basename($_FILES["uploadImage"]["name"]);
        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kollar om det är en bild
        $check = getimagesize($_FILES["uploadImage"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = true;
        } else {
            if(isset($_POST['imageNameEdit'])){ 
                // Retunerar Felmedelanden beroende på om 'Redigera' eller 'Lägg till'
                header('Location: ./user_admin.php' . $postIdEdit . '&errorEdit=Filen är inte en bild.&open=checked&undo=false');
            } else {
                header('Location: ./user_admin.php?error=Filen är inte en bild.');
            }
            $uploadOk = false;
        }

        // Kollar filstorlek (max 4MB)
        if ($_FILES["uploadImage"]["size"] > 4000000) {
            $uploadOk = false;
            // Retunerar Felmedelanden beroende på om 'Redigera' eller 'Lägg till'
            if(isset($_POST['imageNameEdit'])){ 
                header('Location: ./user_admin.php' . $postIdEdit . '&errorEdit=Bilden ' . $uploadImageName . ' är för stor. Max 4MB&open=checked&undo=false');
            } else {
                header('Location: ./user_admin.php?error=Bilden ' . $uploadImageName . ' är för stor. Max 4MB');
            }
        }

        // Tillåt vissa mime-typer
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = false;
            // Retunerar Felmedelanden beroende på om 'Redigera' eller 'Lägg till'
            if(isset($_POST['imageNameEdit'])){ 
                header('Location: ./user_admin.php' . $postIdEdit . '&errorEdit=Endast JPG, JPEG, PNG & GIF filer är tillåtna.&open=checked&undo=false');
            } else {
                header('Location: ./user_admin.php?error=Endast JPG, JPEG, PNG & GIF filer är tillåtna.');
            }
        }

        // Kollar om $uploadOk är satt till false av ett fel
        if ($uploadOk == false) {
        // Om inte $uploadOk == false, försök ladda upp Bilden
        } else {
            if (move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $target_file)) {
                if(isset($_POST['postIdEdit'])){ // Hämtar rätt ID till inlägg 
                    $postIdNumber = $_POST['postIdEdit'];
                }
                // Retunerar bildnamn beroende på om 'Redigera' eller 'Lägg till'
                if(isset($_POST['imageNameEdit'])){ 
                    header('Location: ./user_admin.php?imageNameEdit=' . $postIdNumber . '&open=checked&undo=false&theImageNameEdit='. htmlspecialchars(basename($_FILES["uploadImage"]["name"])));
                } else {
                    header('Location: ./user_admin.php?imageName=' . htmlspecialchars(basename($_FILES["uploadImage"]["name"])));
                }
            } else {
                // Retunerar Felmedelanden beroende på om 'Redigera' eller 'Lägg till'
                if(isset($_POST['imageNameEdit'])){ 
                    header('Location: ./user_admin.php' . $postIdEdit . '&errorEdit=Ett fel inträffade vid uppladdningen av Bilden.&open=checked&undo=false');
                } else {
                    header('Location: ./user_admin.php?error=Ett fel inträffade vid uppladdningen av Bilden.');
                }
            }
        }
    } else {
        // Retunerar Felmedelanden beroende på om 'Redigera' eller 'Lägg till'
        if(isset($_POST['imageNameEdit'])){ 
            header('Location: ./user_admin.php' . $postIdEdit . '&errorEdit=Ingen fil valdes för uppladdning.&open=checked&undo=true');
        } else {
            header('Location: ./user_admin.php?error=Ingen fil valdes för uppladdning.');
        }
    }
}
?>
