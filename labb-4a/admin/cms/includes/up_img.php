<?php
if (isset($_POST["upload-file"])) {
    echo "här";
    //var_dump($_FILES["uploadImage"]);
    echo "<pre>";
        print_r($_FILES["uploadImage"]['name']);
    echo "</pre>";

    if ($_FILES["uploadImage"]['name']) {
        $target_dir = "../../uploads/"; // Mapp där bild sparas
        $target_file = $target_dir . basename($_FILES["uploadImage"]["name"]);
        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kollar om det är en bild
        $check = getimagesize($_FILES["uploadImage"]["tmp_name"]);
        if ($check !== false) {
            echo "Filen är en bild - " . $check["mime"] . ".";
            $uploadOk = true;
        } else {
            echo "Filen är inte en bild.";
            $uploadOk = false;
        }

        // Kollar om bilden redan finns
        // if (file_exists($target_file)) {
        //     echo "Bilden finns redan.";
        //     $uploadOk = false;
        // }

        // Kollar filstorlek (max 4MB)
        if ($_FILES["uploadImage"]["size"] > 4000000) {
            echo "Bilden är för stor.";
            $uploadOk = false;
        }

        // Tillåt vissa mime-typer
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Endast JPG, JPEG, PNG & GIF filer är tillåtna.";
            $uploadOk = false;
        }

        // Kollar om $uploadOk är satt till false av ett fel
        if ($uploadOk == false) {
            echo "Bilden kunde inte laddas upp.";
        // Försök ladda upp Bilden
        } else {
            if (move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $target_file)) {
                echo "Bilden ". htmlspecialchars(basename($_FILES["uploadImage"]["name"])) . " har laddats upp.";
                //htmlspecialchars(basename($_FILES["uploadImage"]["name"]));
                if(isset($_POST['postIdEdit'])){
                    $postIdNumber = $_POST['postIdEdit'];
                }
                if(isset($_POST['imageNameEdit'])){
                    header('Location: ./user_admin.php?imageNameEdit=' . $postIdNumber . '&open=checked&undo=false&theImageNameEdit='. htmlspecialchars(basename($_FILES["uploadImage"]["name"])));
                } else {
                    header('Location: ./user_admin.php?imageName=' . htmlspecialchars(basename($_FILES["uploadImage"]["name"])));
                }
            } else {
                echo "Ett fel inträffade vid uppladdningen av Bilden.";
            }
        }
    } else {
        echo "Ingen fil valdes för uppladdning.";
    }
}
?>
