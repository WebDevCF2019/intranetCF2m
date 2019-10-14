<?php

require_once 'index.php';

if (isset($_FILES['avatar'])) {
    echo 'COUCOU';

    index::file_upload();
} else {
    echo 'RATE';
}

?>

<!DOCTYPE html>
<meta lang='fr'>
<html>
<head>
</head>
<body>
<h1>Upload de l'image</h1>
<br />
<form method="POST" action="upload.php" enctype="multipart/form-data">
     <!-- On limite le fichier à 100Ko -->
     <input type="hidden" name="MAX_FILE_SIZE" value="100000">
     Fichier : <input type="file" name="avatar">
     <input type="submit" value="Envoyer le fichier">
</form>
</body>
</html>
