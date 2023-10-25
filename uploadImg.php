<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image'])) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
            echo "Soubor není podporován. Povolené formáty jsou JPG, JPEG, PNG nebo GIF.";
            $uploadOk = 0;
        }

        if ($_FILES["image"]["size"] > 10000000) {
            echo "Soubor je velký.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Nahrávání obrázku selhalo.";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                $_SESSION['uploaded_image'] = basename($_FILES["image"]["name"]);
                header("Location: index.php");
                exit;
            } else {
                echo "Nahrávání obrázku selhalo.";
            }
        }
    }
}
?>
