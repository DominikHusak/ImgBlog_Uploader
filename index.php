<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>WA_DU</title>
</head>
    <body>
        <h1 class="text-center">Nahrání obrázku</h1>
        <form action="uploadImg.php" method="post" enctype="multipart/form-data">
            <div class="d-flex justify-content-center">
                Vyberte obrázek s maximální veliskotí 10MB:
                <input type="file" name="image" id="image">
                <input type="submit" value="Nahrát obrázek" name="upload_image">
            </div>
        </form>

        <h1 class="text-center">Nahráný obrázek:</h1>
            <div class="d-flex justify-content-center">
                <?php
                if (isset($_SESSION['uploaded_image'])) {
                    $uploadedImage = $_SESSION['uploaded_image'];
                    echo "<img src='uploads/$uploadedImage' alt='NahranyObrazek'>";
                }
                ?>
            </div>

        <h1 class="text-center">Přidat textový záznam</h1>
        <form action="processBlog.php" method="post">
            <div class="d-flex justify-content-center">
                Textový záznam:<br>
                <textarea name="blog_text" rows="4" cols="50"></textarea><br>
                <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <input type="submit" value="Přidat textový záznam" name="add_blog">
            </div>
        </form>

        <h1 class="text-center">Textové záznamy:</h1>
            <div class="d-flex justify-content-center">
                <?php
                $messageFile = "messages/blog";
                if (file_exists($messageFile)) {
                    $messages = file($messageFile);
                    echo "<ul>";
                    foreach ($messages as $message) {
                        echo "<li>$message</li>";
                    }
                    echo "</ul>";
                } 
                ?>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>

